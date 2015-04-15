<?php

namespace Rest;

class App
{

    private $router;
    private $config;

    static public function run($config)
    {
        $app = new Self($config);
    }

    public function __construct($config)
    {
        $this->router = new Router;
        $this->config = $config;
        $this->dispatch();
    }

    public function getConfig()
    {
        return $this->config;
    }

    private function dispatch()
    {
        $route = $this->router->getRoute();
        $controller = 'App\Controller\\'.ucfirst($route['controller']).'Controller';
        if(!class_exists($controller)) {
            $this->dispatch404();
            return false;
        }
        $controller = new $controller($this);
        if(!method_exists($controller, $route['action'].'Action')) {
            $this->dispatch404();
            return false;
        }
        call_user_func_array([$controller, $route['action'].'Action'], $route['args']);
    }

    private function dispatch404()
    {
        call_user_func_array([new \App\Controller\DefaultController($this), 'errorAction'], ['code' => 404]);
    }
}