<?php

namespace App\Controller;

use Rest\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $this->get('view')->render(['message' => 'WrongWay'], 404);
    }

    public function errorAction($code)
    {
        $this->get('view')->render(['code' => $code], 404);
    }
}