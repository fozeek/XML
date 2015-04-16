<?php

namespace App\Controller;

use Rest\Controller;

class MediaController extends Controller
{
    public function indexAction()
    {
        $this->get('view')->render(['name' => 'medias', 'children' => $this->get('db')->get('media')->findAll()]);
    }

    public function showAction($id)
    {
        $this->get('view')->render(['name' => 'media', 'children' => $this->get('db')->get('media')->find($id)]);
    }

    public function editAction($id)
    {
        if($this->get('request')->is('post') || $this->get('request')->is('update')) {
            return $this->get('view')->render(['media' => $this->get('db')->get('media')->update($id, $this->get('request')->getData())]);
        }
        return $this->get('view')->render([], 405);
    }

    public function deleteAction($id)
    {
        if($this->get('request')->is('delete')) {
            return $this->get('view')->render(['media' => $this->get('db')->get('media')->delete($id)]);
        }
        return $this->get('view')->render([], 405);
    }
}