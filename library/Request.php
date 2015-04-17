<?php

namespace Rest;

class Request
{
    public function is($method)
    {
        return strtolower($_SERVER['REQUEST_METHOD']) == strtolower($method);
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
}
