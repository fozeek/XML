<?php

namespace App\Controller;

use Rest\Controller;

class GameController extends Controller
{
    public function listAction()
    {
        $this->get('view')->render(['games' => $this->get('db')->get('game')->findAll()]);
    }

    public function indexAction($id)
    {
        $this->get('view')->render(['game' => $this->get('db')->get('game')->find($id)]);
    }
}