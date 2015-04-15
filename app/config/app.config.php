<?php

return [
    'db' => [
        'host' => 'localhost',
        'database' => 'xml',
        'user' => 'root',
        'password' => 'root'
    ],
    'models' => [
        'game' => 'App\Model\Game',
    ],
    'services' => [
        'db' => function($app) {
            return new Rest\Db($app->getConfig()['db'], $app->getConfig()['models']);
        },
        'request' => function() {
            return new Rest\Request();
        },
        'view' => function() {
            return new Rest\View();
        },
    ],
    'token' => 'mf45dlbnr593zadrn49nek',
];