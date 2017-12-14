<?php

namespace vendorcore\core\base;


class View
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


    public function __construct($route, $view = '', $layout = '')
    {
        $this->route = $route;
        $layout === false ? $this->layout = false : $this->layout = $layout ?: LAYOUT;
        $this->view = $view;
    }

    public function render($vars)
    {
        if(is_array($vars))
        {
            extract($vars);
        }
        $file_view = APP . "/views/" . str_replace('Controller','',$this->route['controller'])
            . "/{$this->view}.php";

        //всё что после этого, кладётся в буфер и не выводится на экран
        ob_start();
        if(is_file($file_view))
        {
            require $file_view;
        }
        else
        {
            dd("Not found view: <b>$file_view</b>");
        }
        //сохраняем то что в буфере в переменную и отчищаем буфер
        $content = ob_get_clean();

        if($this->layout !== false)
        {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($file_layout))
            {
                require $file_layout;
            }
            else
            {
                dd("Not found layout: <b>$file_layout</b>");
            }
        }
    }

}