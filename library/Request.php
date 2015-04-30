<?php

namespace Rest;

class Request
{
    public function is($method)
    {
        return strtolower($this->getMethod()) == strtolower($method);
    }

    public function getMethod() 
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getData()
    {
        return array_merge(
                $_FILES,
                $_POST
            );
    }

    public function getPayload()
    {
        return file_get_contents('php://input');
    }

    public function getParam($key)
    {
        return isset($_GET[$key]) ? $_GET[$key] : false;
    }

    public function getHost()
    {
        return $_SERVER['HTTP_HOST'];
    }
}
