<?php
error_reporting(-1);
use vendorcore\core\Router;
$query = rtrim($_SERVER['QUERY_STRING'],'/');
    define('WWW',__DIR__);
    define('CORE', dirname(__DIR__) . '/vendorcore/core');
    define('ROOT',dirname(__DIR__));
    define('APP',dirname(__DIR__) . '/app');

    require '../vendorcore/libs/functions.php';

spl_autoload_register(function ($class){
    $file = ROOT . '/' . str_replace('\\','/', $class) . '.php';
//    echo $file . '<br>';
    if(is_file($file))
    {
        require_once $file;
    }
});

    //defaults routes
    Router::add('^$',['controller'=>'Main', 'action'=>'index']);
    Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

    Router::dispatch($query);