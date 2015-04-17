<?php

namespace App\Controller;

use Rest\Controller;
use Rest\Xml;

class GameController extends Controller
{
    public function indexAction()
    {
        $this->get('view')->render(['name' => 'gamelist', 'children' => $this->get('db')->get('game')->findAll()]);
    }

    public function showAction($id)
    {
        $this->get('view')->render(['name' => 'game', 'children' => $this->get('db')->get('game')->find($id)]);
    }

    public function editAction($id)
    {
        if($this->get('request')->is('post') || $this->get('request')->is('update')) {
            $payload = $this->get('request')->getPayload();
            $xml = new \DOMDocument;
            $xml->loadXML($payload);
            $errors = Xml::check($xml, 'data/gamelist.xsd');
            if(count($errors)>0) {
                return $this->get('view')->render([], 417);
            }
            $data = Xml::xmlToArray($xml);
            return $this->get('view')->render(['game' => $this->get('db')->get('game')->update($id, $data)]);
        }
        return $this->get('view')->render([], 405);
    }

    public function deleteAction($id)
    {
        if($this->get('request')->is('delete')) {
            return $this->get('view')->render(['game' => $this->get('db')->get('game')->delete($id)]);
        }
        return $this->get('view')->render([], 405);
    }
}