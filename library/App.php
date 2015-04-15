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
        if(!class_exists($controller)) {
            $this->dispatch404();
            return false;
        }
        $controller = new $controller();
        if(!method_exists($controller, $route['action'].'Action')) {
            $this->dispatch404();
            return false;
        }
        call_user_func_array([$controller, $route['action'].'Action'], $route['args']);
    }

    private function dispatch404()
    {
        call_user_func_array([new \App\Controller\DefaultController(), 'errorAction'], ['code' => 404]);
    }
}