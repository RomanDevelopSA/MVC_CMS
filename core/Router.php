<?php

namespace core;

class Router
{
    private $config_routes;

    public function __construct()
    {
        $this->config_routes = require_once 'config/config_routes_old.php';
    }

    public function run()
    {
        echo "REQUEST_URI: ".$_SERVER['REQUEST_URI'].'<br/>';
        echo "HTTP_HOST: ".$_SERVER['HTTP_HOST'].'<br/>';
        //=================================
        //$part = $_SERVER['HTTP_HOST'];
        //$route = $this->config_routes[$part];
        $section = array_search($_SERVER['HTTP_HOST'],$this->config_routes);
        $path = "controllers\\" . ucfirst($section) . "Controller";

        $action = $section.'Action';
        $controller = new $path($section);
        $controller->$action();
    }


}