<?php

namespace App\Controller;

use Rest\Controller;

class Defaultcontroller extends Controller
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
