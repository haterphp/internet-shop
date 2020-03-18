<?php

namespace vendor\route;

use vendor\exceptions\CustomException;

class Route
{
    public static $p;
    public static $requests = [];

    private static function find()
    {
        return self::$requests[$_SERVER['REQUEST_URI']];
    }

    public static function open()
    {
        if($page = self::find()){
            if($_SERVER['REQUEST_METHOD'] == $page['method']){
                $controller_name = __DIR__.'/../../app/controllers/'.$page['controller'].'.php';
                if(file_exists($controller_name)){
                    $controller = "\\app\\controllers\\".$page['controller'];
                    $controller = new $controller;
                    if(method_exists($controller, $page['action'])){
                        $action = $page['action'];
                        $controller->$action();
                        return;
                    }
                    throw new CustomException("Function {$page['action']} Not Found", 404);
                }
                throw new CustomException("Controller {$page['controller']} Not Found", 404);
            }
            throw new CustomException("The {$_SERVER['REQUEST_METHOD']} method is not supported for this route. Supported methods: {$page['method']}.", 404);
        }
        throw new CustomException('Page not found', 404);
    }

    public static function prefix($value = '')
    {
        self::$p = $value;
    }

    private static function push_request($url, $go_to, $method)
    {
        $go_to = explode('@', $go_to);

        if ($url[0] != "/") {
            $url = "/" . $url;
        }

        if(self::$p){
            $url = '/'.self::$p.$url;
        }

        self::$requests[$url] = [
            'method' => strtoupper($method),
            'controller' => $go_to[0],
            'action' => $go_to[1],
        ];
    }

    public static function get($url, $controller)
    {
        self::push_request($url, $controller, 'get');
    }

    public static function post($url, $controller)
    {
        self::push_request($url, $controller, 'post');
    }

    public static function delete($url, $controller)
    {
        self::push_request($url, $controller, 'delete');
    }

    public static function put($url, $controller)
    {
        self::push_request($url, $controller, 'put');
    }
}

?>