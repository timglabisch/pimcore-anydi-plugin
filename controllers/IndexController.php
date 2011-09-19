<?php

class Anydic_IndexController extends Pimcore_Controller_Action {

    /** @var iFoo !inject */
    public $foo;

    public function indexAction() {
        var_dump($this->foo);
        die();
    }

}