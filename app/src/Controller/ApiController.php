<?php

namespace App\Controller;

use Rest\Controller;

abstract class ApiController extends Controller
{
    protected $ressource;

    public function init()
    {
        parent::init();
        $this->ressource = $this->route['controller'];
    }

    public function indexAction()
    {
        if ($this->get('request')->is('post')) {
            // Création de la ressource
            $data = $this->get('request')->getData();
            $exec = $this->get('db')->get($this->ressource)->create($data);
            if($exec !== false) {
                return $this->get('view')->render(['name' => 'success', 'children' => [['name' => 'code', 'textValue' => 200], ['name' => 'message', 'textValue' => ucfirst($this->ressource) . ' successfully created. ('.$exec.' rows)']]], 200);
            } else {
                return $this->get('view')->render([], 422);
            }
        }

        // Liste de la ressource
        return $this->get('view')->render(['name' => $this->ressource.'list', 'children' => $this->get('db')->get($this->ressource)->findAll()]);
    }

    public function showAction($id)
    {
        if ($this->get('request')->is('post') || $this->get('request')->is('put')) {
            $data = [];
            parse_str($this->get('request')->getPayload(), $data);
            $exec = $this->get('db')->get($this->ressource)->update($id, $data);
            if($exec !== false) {
                return $this->get('view')->render(['name' => 'success', 'children' => [['name' => 'code', 'textValue' => 200], ['name' => 'message', 'textValue' => ucfirst($this->ressource).' sucessfully updated. ('.$exec.' rows)']]], 200);
            } else {
                return $this->get('view')->render([], 422);
            }
        } elseif ($this->get('request')->is('delete')) {
            return $this->get('view')->render([$this->ressource => $this->get('db')->get($this->ressource)->delete($id)]);
        }

        // Affiche la ressource
        $object = $this->get('db')->get($this->ressource)->find($id);
        if($object){
            return $this->get('view')->render($object);
        }
        return $this->get('view')->render([], 500);
    }
}
