<?php

namespace Rest;

class App
{

    private $router;

    static public function run()
    {
        $app = new Self;
    }

    public function __construct()
    {
        $this->router = new Router;
        $this->dispatch();
    }

    private function dispatch()
    {
        $route = $this->router->getRoute();
        $controller = 'App\Controller\\'.ucfirst($route['controller']).'Controller';
        $controller = new $controller();
        call_user_func_array([$controller, $route['action'].'Action'], $route['args']);
    }
}