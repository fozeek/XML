<?php

namespace App\Controller;

use Rest\Controller;

class SupportController extends Controller
{
    public function indexAction()
    {
        $this->get('view')->render(['name' => 'supports', 'children' => $this->get('db')->get('support')->findAll()]);
    }

    public function showAction($id)
    {
        $this->get('view')->render(['name' => 'support', 'children' => $this->get('db')->get('support')->find($id)]);
    }

    public function editAction($id)
    {
        if ($this->get('request')->is('post') || $this->get('request')->is('update')) {
            return $this->get('view')->render(['support' => $this->get('db')->get('support')->update($id, $this->get('request')->getData())]);
        }

        return $this->get('view')->render([], 405);
    }

    public function deleteAction($id)
    {
        if ($this->get('request')->is('delete')) {
            return $this->get('view')->render(['support' => $this->get('db')->get('support')->delete($id)]);
        }

        return $this->get('view')->render([], 405);
    }
}
