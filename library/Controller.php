<?php

namespace Rest;

abstract class Controller
{
    private $services = [];
    protected $app;
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
            if (!isset($_SERVER['HTTP_NAME']) || !isset($_SERVER['HTTP_MAIL']) || !isset($_SERVER['HTTP_APP_ID'])) {
                $this->get('view')->render([], 401);
            }
            $user = $this->get('db')->get('user')->findBy(['name' => $_SERVER['HTTP_NAME'], 'mail' => $_SERVER['HTTP_MAIL'], 'app_id' => $_SERVER['HTTP_APP_ID'], 'host' => $_SERVER['HTTP_REFERER']]);

            if (!$user) {
                $this->get('view')->render([], 401);
            }

            $user = $user[0];
            $userAttributes = $user['attributes'];

            $time = time();
            $sessionTime = 5;
            $authenticate = false;

            for ($i = 0; $i < $sessionTime; $i++) {
                $newTime = $time - $i;
                $hash = hash_hmac('sha256', $userAttributes['app_secret'].$_SERVER['HTTP_NAME'].$newTime.$_SERVER['HTTP_MAIL'].$_SERVER['HTTP_REFERER'], $_SERVER['HTTP_APP_ID']);

                if ($_SERVER['HTTP_HASH'] == $hash) {
                    $authenticate = true;
                }
            }

            if (!$authenticate) {
                $this->get('view')->render([], 401);
            }

            if (count($user['children'][0]) < 1) {
                $this->get('view')->render([], 401);
            }

            $granted = false;
            foreach ($user['children'][0]['children'][0]['children'][0]['children'] as $access) {
                if ($access['attributes']['name'] == strtolower($this->route['controller'].'_'.$this->get('request')->getMethod())) {
                    $granted = true;
                }
            }

            if (!$granted) {
                $this->get('view')->render([], 401);
            }
        }
    }
}
