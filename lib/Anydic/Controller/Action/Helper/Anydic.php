<?php

interface iFoo {}
class foo implements iFoo {}

class Anydic_Controller_Action_Helper_Anydic extends Zend_Controller_Action_Helper_Abstract {
    public function init() {
        require_once __DIR__.'/../../../../Di/di.php';
        $di = new \de\any\di();
        $di->bind('iFoo')->to('Foo');
        $di->justInject($this->getActionController());
    }
}