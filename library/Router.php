<?php

namespace Rest;

class Router
{
    private function getUri()
    {
        return $_SERVER['REDIRECT_URL'];
    }

    public function getRoute()
    {
        $tab = array_values(array_filter(explode('/', $this->getUri())));
        $controller = isset($tab[0]) ? $tab[0] : 'default';
        $action = isset($tab[1]) ? $tab[1] : 'index';
        $args = isset($tab[2]) ? array_slice($tab, 2) : [];
        return [
            'controller' => $controller,
            'action' => $action,
            'args' => $args
        ];
    }
}