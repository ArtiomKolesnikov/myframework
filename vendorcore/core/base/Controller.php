<?php

namespace vendorcore\core\base;


abstract class Controller
{
    public $route = [];
    public $view;

    public function __construct($route)
    {
        $this->route = $route;
//        $this->view = $route['action'];
//        include APP . "/views/" . str_replace('Controller','',$route['controller']) . "/{$this->view}.php";
    }
}