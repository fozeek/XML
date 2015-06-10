<?php

namespace Rest;

class Router
{
    private function getUri()
    {
        if (isset($_SERVER['REDIRECT_URL'])) {
            return $_SERVER['REDIRECT_URL'];
        }

        return '/';
    }

    public function getRoute()
    {
        //format
        $format = 'xml';
        $uri = $this->getUri();
        $exp = explode('.', $uri);
        if (count($exp)>1) {
            $format = $exp[1];
            $uri = $exp[0];
        }

        $tab = array_values(array_filter(explode('/', $uri)));
        $controller = isset($tab[0]) ? $tab[0] : 'default';
        $args = isset($tab[1]) ? array_slice($tab, 1) : [];
        $action = count($args)>0 ? 'show' : 'index';

        return [
            'uri' => $this->getUri(),
            'controller' => $controller,
            'action' => $action,
            'format' => $format,
            'args' => $args,
        ];
    }
}
