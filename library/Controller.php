<?php

namespace Rest;

abstract class Controller
{

    private $services = [];
    private $app;
    protected $format = false;
    protected $route;

    public function __construct($app)
    {
        $this->app = $app;
        $this->route = $app->getRoute();
        foreach ($app->getConfig()['services'] as $key => $value) {
            $this->services[$key] = $value($app);
        }
        $this->init();
    }

    public function get($service)
    {
        return $this->services[$service];
    }

    public function init()
    {
        // Gestion du token
        $token = $this->get('request')->getParam('token');
        if(!$token | $this->app->getConfig()['token'] != $token) {
            $this->get('view')->render([], 401);
        }
    }

}