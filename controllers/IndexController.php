<?php

class Anydic_IndexController extends Pimcore_Controller_Action {

    /** @var \de\any\iDi !inject */
    public $di;

    /** @var Anydic_Testclass_iFoo !inject */
    public $foo;

     /** @var Website_Testclass_iFoo !inject */
    public $websiteFoo;

    public function indexAction() {
        var_dump($this->di);
        echo '<hr/>';
        var_dump($this->foo);
        echo '<hr/>';
        var_dump($this->websiteFoo);
        die();
    }

}