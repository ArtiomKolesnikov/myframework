<?php
namespace app\controllers;

use vendorcore\core\base\Controller;

class PostController extends Controller
{
    public function indexAction()
    {
        echo __METHOD__;
    }

    public function addAction()
    {
        echo __METHOD__;
        d($this->route);
    }
}