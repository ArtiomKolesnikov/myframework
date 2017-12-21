<?php

namespace app\controllers;


use app\models\Main;
use vendorcore\core\base\Controller;

class AppController extends Controller
{
    public $menu;

    public function __construct($route)
    {
        parent::__construct($route);
        new Main;
        $this->menu = \R::findAll('category');

    }
}