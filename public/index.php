<?php
    $query = rtrim($_SERVER['QUERY_STRING'],'/');
    define('WWW',__DIR__);
    define('CORE',dirname(__DIR__) . '/vendor_core/core');
    define('ROOT',dirname(__DIR__));
    define('APP',dirname(__DIR__) . '/app');

require '../vendor_core/core/Router.php';
    require '../vendor_core/libs/functions.php';
//    require '../app/controllers/PostController.php';

spl_autoload_register(function ($class){
    $file = APP . "/controllers/$class.php";
    if(is_file($file))
    {
        require_once $file;
    }
});

    //defaults routes
    Router::add('^$',['controller'=>'Main', 'action'=>'index']);
    Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

    Router::dispatch($query);