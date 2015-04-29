<?php

namespace App\Controller;

use Rest\Controller;
use Rest\Xml;
use DOMDocument;

class GameController extends Controller
{
    public function indexAction()
    {   
        $offset = 1;
        $length = 2;

        $games = $this->get('db')->get('game')->findAll();


        $pagination = array_slice($games, $offset, $length);    


        $this->get('view')->render(['name' => 'gamelist', 'children' => $this->get('db')->get('game')->findAll()]);
    }

    public function showAction($id)
    {
        $this->get('view')->check('data/game.xsd');
        $this->get('view')->render($this->get('db')->get('game')->find($id));
    }

    public function editAction()
    {
        if ($this->get('request')->is('post') || $this->get('request')->is('put')) {
            $payload = $this->get('request')->getPayload();
            $xml = new DOMDocument();
            $xml->loadXML($payload);
            $errors = Xml::check($xml, 'data/game.xsd');
            if (count($errors)>0) {
                return $this->get('view')->render([], 417);
            }
            $data = Xml::xmlToArray($xml);
            if ($this->get('db')->get('game')->update($data) == 0) {
                $this->get('view')->check(false);

                return $this->get('view')->render(['name' => 'success', 'children' => [['name' => 'code', 'textValue' => 200], ['name' => 'message', 'textValue' => 'Sucessfully updated']]], 200);
            } else {
                return $this->get('view')->render([], 500);
            }
        }

        return $this->get('view')->render([], 405);
    }

    public function deleteAction($id)
    {
        if ($this->get('request')->is('delete')) {
            return $this->get('view')->render(['game' => $this->get('db')->get('game')->delete($id)]);
        }

        return $this->get('view')->render([], 405);
    }
}
