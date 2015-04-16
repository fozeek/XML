<?php

namespace App\Controller;

use Rest\Controller;

class DeveloperController extends Controller
{
    public function indexAction()
    {
        $this->get('view')->render(['name' => 'developers', 'children' => $this->get('db')->get('developer')->findAll()]);
    }

    public function showAction($id)
    {
        $this->get('view')->render(['name' => 'developer', 'children' => $this->get('db')->get('developer')->find($id)]);
    }

    public function editAction($id)
    {
        if($this->get('request')->is('post') || $this->get('request')->is('update')) {
            return $this->get('view')->render(['developer' => $this->get('db')->get('developer')->update($id, $this->get('request')->getData())]);
        }
        return $this->get('view')->render([], 404);
    }

    public function deleteAction($id)
    {
        if($this->get('request')->is('delete')) {
            return $this->get('view')->render(['developer' => $this->get('db')->get('developer')->delete($id)]);
        }
        return $this->get('view')->render([], 404);
    }
}