<?php

spl_autoload_register(function ($class) {
    $exp = explode('\\', $class);
    unset($exp[0]);
    if(file_exists('app/src/'.implode('/', $exp).'.php')) {
        include 'app/src/'.implode('/', $exp).'.php';
        return true;
    }
    if(file_exists('library/'.implode('/', $exp).'.php')) {
        include 'library/'.implode('/', $exp).'.php';
        return true;
    }
    return false;
});