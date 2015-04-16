<?php

namespace App\Controller;

use Rest\Controller;

class ThemeController extends Controller
{
    public function indexAction()
    {
        $this->get('view')->render(['name' => 'themes', 'children' => $this->get('db')->get('theme')->findAll()]);
    }

    public function showAction($id)
    {
        $this->get('view')->render(['name' => 'theme', 'children' => $this->get('db')->get('theme')->find($id)]);
    }

    public function editAction($id)
    {
        if($this->get('request')->is('post') || $this->get('request')->is('update')) {
            return $this->get('view')->render(['theme' => $this->get('db')->get('theme')->update($id, $this->get('request')->getData())]);
        }
        return $this->get('view')->render([], 405);
    }

    public function deleteAction($id)
    {
        if($this->get('request')->is('delete')) {
            return $this->get('view')->render(['theme' => $this->get('db')->get('theme')->delete($id)]);
        }
        return $this->get('view')->render([], 405);
    }
}