<?php

namespace App\Controller;

use Rest\Xml;
use DOMDocument;

class GameController extends ApiController
{
    public function indexAction()
    {
        if ($this->get('request')->is('get')) {
            $this->get('view')->check('data/gamelist.xsd');
        }
        parent::indexAction();
    }

    public function showAction($id)
    {
        if ($this->get('request')->is('get')) {
            $this->get('view')->check('data/gamelist.xsd');
        }
        parent::showAction($id);
    }

    protected function updateFromXml($id)
    {
        $payload = $this->get('request')->getPayload();
        $xml = new DOMDocument();
        $xml->loadXML($payload);
        $errors = Xml::check($xml, 'data/game.xsd');
        if (count($errors)>0) {
            return $this->get('view')->render([], 417);
        }
        $data = Xml::xmlToArray($xml);
        if ($this->get('db')->get('game')->updateFromXml($data) == 0) {
            $this->get('view')->check(false);

            return $this->get('view')->render(['name' => 'success', 'children' => [['name' => 'code', 'textValue' => 200], ['name' => 'message', 'textValue' => 'Sucessfully updated']]], 200);
        } else {
            return $this->get('view')->render([], 500);
        }
    }
}
