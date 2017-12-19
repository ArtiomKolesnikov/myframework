<?php
error_reporting(-1);

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use vendorcore\core\Router;
$query = trim($_SERVER['REQUEST_URI'],'/');

define('WWW',__DIR__);
define('CORE', dirname(__DIR__) . '/vendorcore/core');
define('ROOT',dirname(__DIR__));
define('APP',dirname(__DIR__) . '/app');
define('CONFIG',dirname(__DIR__) . '/app/config');
define('LIBS',dirname(__DIR__) . '/vendorcore/libs');
define('LAYOUT','default');

require '../vendorcore/libs/functions.php';

spl_autoload_register(function ($class){
    $file = ROOT . '/' . str_replace('\\','/', $class) . '.php';
//    echo $file . '<br>';
    if(is_file($file))
    {
        require_once $file;
    }
});

//$dotenv = new Dotenv(__DIR__);
//$dotenv->load();

//Routes*****************

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$',['controller'=>'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$',['controller'=>'Page', 'action'=>'view']);

//defaults routes
Router::add('^$',['controller'=>'Main', 'action'=>'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);




