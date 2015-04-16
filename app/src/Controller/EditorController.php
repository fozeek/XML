<?php

namespace App\Controller;

use Rest\Controller;

class EditorController extends Controller
{
    public function indexAction()
    {
        $this->get('view')->render(['name' => 'editors', 'children' => $this->get('db')->get('editor')->findAll()]);
    }

    public function showAction($id)
    {
        $this->get('view')->render(['name' => 'editor', 'children' => $this->get('db')->get('editor')->find($id)]);
    }

    public function editAction($id)
    {
        if($this->get('request')->is('post') || $this->get('request')->is('update')) {
            return $this->get('view')->render(['editor' => $this->get('db')->get('editor')->update($id, $this->get('request')->getData())]);
        }
        return $this->get('view')->render([], 405);
    }

    public function deleteAction($id)
    {
        if($this->get('request')->is('delete')) {
            return $this->get('view')->render(['editor' => $this->get('db')->get('editor')->delete($id)]);
        }
        return $this->get('view')->render([], 405);
    }
}