<?php

namespace app\controllers;


use vendorcore\core\base\Controller;

class NewPageController extends Controller
{
    public function indexAction()
    {
        d($this->route);
        d(__METHOD__);
    }

    public function viewAction()
    {
        d($this->route);
        d(__METHOD__);
    }

    public function getNewPageAction()
    {
        d($this->route);
        d(__METHOD__);
    }
}