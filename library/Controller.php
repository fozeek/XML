<?php

namespace Rest;

abstract class Controller
{
    private $services = [];
    private $app;
    protected $format;
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


        //hash_hmac
    }
}
