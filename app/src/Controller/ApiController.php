<?php

namespace App\Controller;

use Rest\Controller;

class ApiController extends Controller
{
    public function indexAction($ressource)
    {
        $this->get('view')->render(['name' => 'editors', 'children' => $this->get('db')->get($ressource)->findAll()]);
    }

    public function showAction($ressource, $id)
    {
        if($this->get('request')->is('get')) {
            return $this->get('view')->render(['name' => 'editors', 'children' => $this->get('db')->get($ressource)->findBy(['id' => $id])]);
        }
        
    }

    public function deleteAction($code)
    {
        $this->get('view')->render([], 404);
    }
}
