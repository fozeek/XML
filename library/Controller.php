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
        if ($this->app->getConfig()['authenticate']) {
            $user = $this->get('db')->get('user')->findBy(['name' => $_SERVER['HTTP_NAME'], 'mail' => $_SERVER['HTTP_MAIL'], 'app_id' => $_SERVER['HTTP_APP_ID'], 'host' => $_SERVER['HTTP_HOST']]);

            if ($user) {
                $time = round(time()/3);

                var_dump($time);

                $user = $user[0]['attributes'];
                $hash = hash_hmac('sha256', $user['app_secret'].$_SERVER['HTTP_NAME'].$time.$_SERVER['HTTP_MAIL'].$_SERVER['HTTP_HOST'], $_SERVER['HTTP_APP_ID']);

                if ($_SERVER['HTTP_HASH'] != $hash) {
                    $this->get('view')->render([], 401);
                }
            }

            $this->get('view')->render([], 401);
        }
    }
}
