<?php

namespace App\Controller;

class DefaultController
{
    public function indexAction()
    {
        echo json_encode(['message' => 'WrongWay'], JSON_PRETTY_PRINT);
    }

    public function errorAction($code)
    {
        echo json_encode(['code' => $code], JSON_PRETTY_PRINT);
    }
}