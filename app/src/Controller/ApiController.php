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

        $page = $this->get('request')->getParam('page')?:1;
        $count = $this->get('request')->getParam('count')?:5;
        $page -= 1;
        $first = $page*$count;

        $list = $this->get('db')->get($this->ressource)->findAll();
        $parse = array_slice($list, $first, $count);

        $url = 'http://'.$this->get('request')->getHost().'/'.$this->ressource.'.'.$this->get('view')->getFormat();

        if ($page == 0) {
            $urlPrev = false;
        } elseif (count($parse) == 0) {
            $lastPage = ceil(count($list)/$count);
            $urlPrev = $url.'?page='.$lastPage.'&amp;count='.$count;
        } else {
            $urlPrev = $url.'?page='.$page.'&amp;count='.$count;
        }

        if (count($list) > ($first + $count)) {
            $urlNext = $url.'?page='.($page+2).'&amp;count='.$count;
        } else {
            $urlNext = false;
        }

        $pagination = [
                [
                    'name' => 'prev',
                    'textValue' => $urlPrev,
                ],
                [
                    'name' => 'next',
                    'textValue' => $urlNext,
                ],
            ];

        return $this->get('view')->render(['name' => $this->ressource.'list', 'children' => [['name' => 'list', 'children' => $parse], ['name' => 'pagination', 'children' => $pagination]]]);
    }

    public function showAction($id)
    {
        if ($this->get('request')->is('post') || $this->get('request')->is('put')) {
            $data = $this->get('request')->getPayload();
            $exp = explode('&', $data);
            $factoredData = [];
            foreach ($exp as $key => $value) {
                $split = explode('=', $value);
                $factoredData[$split[0]] = $split[1];
            }
            $exec = $this->get('db')->get($this->ressource)->update($id, $factoredData);
            if($exec !== false) {
                return $this->get('view')->render(['name' => 'success', 'children' => [['name' => 'code', 'textValue' => 200], ['name' => 'message', 'textValue' => ucfirst($this->ressource).' sucessfully updated. ('.$exec.' rows)']]], 200);
            } else {
                return $this->get('view')->render([], 500);
            }
        } elseif ($this->get('request')->is('delete')) {
            return $this->get('view')->render([$this->ressource => $this->get('db')->get($this->ressource)->delete($id)]);
        }

        // Affiche la ressource
        $object = $this->get('db')->get($this->ressource)->find($id);
        if($object){
            return $this->get('view')->render($object);
        }
        return $this->get('view')->render([], 422);
    }
}
