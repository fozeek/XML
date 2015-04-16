<?php

namespace App\Controller;

use Rest\Controller;

class ModeController extends Controller
{
    public function indexAction()
    {
        $this->get('view')->render(['name' => 'modes', 'children' => $this->get('db')->get('mode')->findAll()]);
    }

    public function showAction($id)
    {
        $this->get('view')->render(['name' => 'mode', 'children' => $this->get('db')->get('mode')->find($id)]);
    }

    public function editAction($id)
    {
        if($this->get('request')->is('post') || $this->get('request')->is('update')) {
            return $this->get('view')->render(['mode' => $this->get('db')->get('mode')->update($id, $this->get('request')->getData())]);
        }
        return $this->get('view')->render([], 404);
    }

    public function deleteAction($id)
    {
        if($this->get('request')->is('delete')) {
            return $this->get('view')->render(['mode' => $this->get('db')->get('mode')->delete($id)]);
        }
        return $this->get('view')->render([], 404);
    }
}