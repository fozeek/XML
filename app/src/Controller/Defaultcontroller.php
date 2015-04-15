<?php

namespace App\Controller;

class DefaultController
{
    public function indexAction()
    {
        echo json_encode(['message' => 'WrongWay'], JSON_PRETTY_PRINT);
    }
}