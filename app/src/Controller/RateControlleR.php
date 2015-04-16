<?php

namespace App\Controller;

use Rest\Controller;

class RateController extends Controller
{
    public function indexAction()
    {
        $this->get('view')->render(['name' => 'rates', 'children' => $this->get('db')->get('rate')->findAll()]);
    }

    public function showAction($id)
    {
        $this->get('view')->render(['name' => 'rate', 'children' => $this->get('db')->get('rate')->find($id)]);
    }

    public function editAction($id)
    {
        if($this->get('request')->is('post') || $this->get('request')->is('update')) {
            return $this->get('view')->render(['rate' => $this->get('db')->get('rate')->update($id, $this->get('request')->getData())]);
        }
        return $this->get('view')->render([], 404);
    }

    public function deleteAction($id)
    {
        if($this->get('request')->is('delete')) {
            return $this->get('view')->render(['rate' => $this->get('db')->get('rate')->delete($id)]);
        }
        return $this->get('view')->render([], 404);
    }
}