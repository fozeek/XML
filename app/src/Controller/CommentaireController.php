<?php

namespace App\Controller;

use Rest\Controller;

class CommentaireController extends Controller
{
    public function indexAction()
    {
        $this->get('view')->render(['name' => 'commentaires', 'children' => $this->get('db')->get('commentaire')->findAll()]);
    }

    public function showAction($id)
    {
        $this->get('view')->render(['name' => 'commentaire', 'children' => $this->get('db')->get('commentaire')->find($id)]);
    }

    public function editAction($id)
    {
        if($this->get('request')->is('post') || $this->get('request')->is('update')) {
            return $this->get('view')->render(['commentaire' => $this->get('db')->get('commentaire')->update($id, $this->get('request')->getData())]);
        }
        return $this->get('view')->render([], 405);
    }

    public function deleteAction($id)
    {
        if($this->get('request')->is('delete')) {
            return $this->get('view')->render(['commentaire' => $this->get('db')->get('commentaire')->delete($id)]);
        }
        return $this->get('view')->render([], 405);
    }
}