<?php

require 'Curl.php';

$curl = new Curl('http://xml.dev/game/index.xml');

var_dump($curl->getContent());