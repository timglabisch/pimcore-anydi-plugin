<?php

use de\any\di;
use de\any\di\binder\parser\xml;

interface iFoo {}
class foo implements iFoo {}

class Anydic_Controller_Action_Helper_Anydic extends Zend_Controller_Action_Helper_Abstract {

    protected function getDependencyFolders() {
        $dirs = array();

        $directoryIterator = new DirectoryIterator(PIMCORE_PLUGINS_PATH);

        $dirs[] = PIMCORE_WEBSITE_PATH;

        foreach($directoryIterator as $directory) {
            if(!$directory->isDir() || $directory->isDot())
                continue;

            $dirs[] = $directory->getPathname();
        }

        return $dirs;
    }

    public function init() {
        require_once __DIR__.'/../../../../Di/di.php';
        require_once __DIR__.'/../../../../Di/DI/binder/parser/xml.php';

        $repository = new \de\any\di\binder\repository();
        
        foreach($this->getDependencyFolders() as $folder) {
            $diFile = $folder.'/dependencies.xml';

            if(!file_exists($diFile))
                continue;
            
            $xml = new xml(file_get_contents($folder.'/dependencies.xml'));
            $repository->addBindings($xml->getBindings());
        }

        $di = new di();
        $di->setBinderRepository($repository);
        $di->bind('\de\any\iDi')->to($di);
        $di->bind('iFoo')->to('Foo');
        
        $di->justInject($this->getActionController());
    }
}