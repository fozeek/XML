<?php

namespace Rest;

abstract class Controller
{

    private $services = [];

    public function __construct($app)
    {
        foreach ($app->getConfig()['services'] as $key => $value) {
            $service[$key] = $value($app);
        }
    }

    public function get($service)
    {
        return $this->services[$service];
    }

}