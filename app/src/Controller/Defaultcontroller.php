<?php

namespace App\Controller;

use Rest\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $this->get('view')->render([], 404);
    }

    public function errorAction($code)
    {
        $this->get('view')->render([], 404);
    }
}