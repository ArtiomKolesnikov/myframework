<?php

namespace vendorcore\core\base;


abstract class Controller
{
    /**
     * Текущий маршрут и параметры ( controller, action, params)
     * @var array
     */
    public $route = [];

    /**
     * Текущий вид
     * @var string
     */
    public $view;

    /**
     * Текущий шаблон
     * @var string
     */
    public $layout;

    /**
     * Параметры
     * @var array
     */
    public $vars = [];

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView()
    {
        $vObj = new View($this->route, $this->view, $this->layout);
        $vObj->render($this->vars);
    }

    public function with($vars)
    {
        $this->vars = $vars;
    }
}