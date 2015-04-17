<?php

namespace Rest;

use ReflectionClass;

class App
{
    private $router;
    private $config;
    private $route;

    public static function run($config)
    {
        $app = new Self($config);
    }

    public function __construct($config)
    {
        $this->router = new Router();
        $this->config = $config;
        $this->dispatch();
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function getRoute()
    {
        return $this->route;
    }

    private function dispatch()
    {
        $this->route = $this->router->getRoute();
        $controller = 'App\Controller\\'.ucfirst($this->route['controller']).'Controller';
        if (!class_exists($controller)) {
            $this->dispatch404();

            return false;
        }
        $controller = new $controller($this);
        if (!method_exists($controller, $this->route['action'].'Action')) {
            $this->dispatch404();

            return false;
        }
        $reflexion = new ReflectionClass($controller);
        $methods = $reflexion->getMethod($this->route['action'].'Action');
        $params = $methods->getParameters();
        if (count($this->route['args']) != count($params)) {
            $this->dispatch404();

            return false;
        }
        call_user_func_array([$controller, $this->route['action'].'Action'], $this->route['args']);
    }

    private function dispatch404()
    {
        call_user_func_array([new \App\Controller\DefaultController($this), 'errorAction'], ['code' => 404]);
    }
}
