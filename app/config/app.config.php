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
        'mode' => 'App\Model\Mode',
        'genre' => 'App\Model\Genre',
        'editor' => 'App\Model\Editor',
        'theme' => 'App\Model\Theme',
        'support' => 'App\Model\Support',
        'developer' => 'App\Model\Developer',
        'rate' => 'App\Model\Rate',
        'media' => 'App\Model\Media',
        'commentaire' => 'App\Model\Commentaire',
        'user' => 'App\Model\User',
        'role' => 'App\Model\Role',
        'access' => 'App\Model\Access',
    ],
    'services' => [
        'db' => function($app) {
            return new Rest\Db($app->getConfig()['db'], $app->getConfig()['models'], $app->getRoute()['format']);
        },
        'request' => function() {
            return new Rest\Request();
        },
        'view' => function($app) {
            return new Rest\View($app->getRoute()['format']);
        },
        'xml' => function($app) {
            return new Rest\Xml();
        },
    ],
    'authenticate' => false
];