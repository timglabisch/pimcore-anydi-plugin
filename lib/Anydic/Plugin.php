<?php

require_once __DIR__.'/../Di/di.php';


Zend_Controller_Action_HelperBroker::addHelper(new Anydic_Controller_Action_Helper_Anydic());
Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);

class Anydic_Plugin extends Pimcore_API_Plugin_Abstract implements Pimcore_API_Plugin_Interface {


    public static function install() {

        if (self::isInstalled()) {
            $statusMessage = "AnyDic Plugin successfully installed.";
        } else {
            $statusMessage = "AnyDic Plugin could not be installed";
        }
        return $statusMessage;

    }

    public static function uninstall() {

        if (!self::isInstalled()) {
            $statusMessage = "AnyDic Plugin successfully uninstalled.";
        } else {
            $statusMessage = "AnyDic Plugin could not be uninstalled";
        }
        return $statusMessage;

    }

    public static function isInstalled() {
       return true;
    }

    public static function getTranslationFileDirectory() {
        return PIMCORE_PLUGINS_PATH . "/AnyDic/texts";
    }

    /**
     *
     * @param string $language
     * @return string path to the translation file relative to plugin direcory
     */
    public static function getTranslationFile($language) {
        if (is_file(PIMCORE_PLUGINS_PATH . "/AnyDic/texts/" . $language . ".csv")) {
            return "/AnyDic/texts/" . $language . ".csv";
        } else {
            return "/AnyDic/texts/en.csv";
        }

    }

}