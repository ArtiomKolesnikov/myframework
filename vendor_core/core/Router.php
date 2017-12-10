<?php

class Router
{
    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route)
        {
            if(preg_match("#$pattern#i",$url, $matches))
            {
                foreach ($matches as $key => $val)
                {
                    if(is_string($key))
                    {
                        $route[$key] = $val;
                    }
                }
                if(!isset($route['action']))
                {
                    $route['action'] = 'index';
                }
                self::$route = $route;
                self::$route['controller'] = ucfirst($route['controller']) . 'Controller';
                return true;
            }
        }
        return false;
    }

    public static function dispatch($url)
    {
        if(self::matchRoute($url))
        {
            $controller = self::upperCamelCase(self::$route['controller']);
            if(class_exists($controller))
            {
                $controllerObject = new $controller;
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($controllerObject,$action))
                {
                    $controllerObject->$action();
                }
                else
                {
                    echo "action $action not found";
                }
            }
        else{
                echo "controller $controller not found";
            }
        }else
        {
            http_response_code(404);
            include '404.php';
        }
    }

    protected static function upperCamelCase($name)
    {
        return str_replace(' ','',ucwords(str_replace('-',' ',$name)));
    }

    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }


}