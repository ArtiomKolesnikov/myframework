<?php

namespace app\controllers;


use vendorcore\core\base\Controller;

class PageController extends Controller
{
    public function viewAction()
    {
        d($this->route);
        d($_GET);
        d(__METHOD__);
    }
}