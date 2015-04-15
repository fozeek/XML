<?php

namespace Rest;

class Request
{

    public function is($method)
    {
        return strtolower($_SERVER['REQUEST_METHOD']) == strtolower($method);
    }

}