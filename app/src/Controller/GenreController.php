<?php

namespace App\Controller;

use Rest\Controller;

class GenreController extends Controller
{
    public function indexAction()
    {
        $this->get('view')->render(['name' => 'genres', 'children' => $this->get('db')->get('genre')->findAll()]);
    }

    public function showAction($id)
    {
        $this->get('view')->render(['name' => 'genre', 'children' => $this->get('db')->get('genre')->find($id)]);
    }

    public function editAction($id)
    {
        if ($this->get('request')->is('post') || $this->get('request')->is('update')) {
            return $this->get('view')->render(['genre' => $this->get('db')->get('genre')->update($id, $this->get('request')->getData())]);
        }

        return $this->get('view')->render([], 405);
    }

    public function deleteAction($id)
    {
        if ($this->get('request')->is('delete')) {
            return $this->get('view')->render(['genre' => $this->get('db')->get('genre')->delete($id)]);
        }

        return $this->get('view')->render([], 405);
    }
}
