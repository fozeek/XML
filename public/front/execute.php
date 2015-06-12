<?php

error_reporting(E_ALL);
ini_set('display_errors', 1); 

//header('Content-Type: application/xml; charset=utf-8');

require 'Curl.php';

$curl = new Curl('musha', 'f02368945726d5fc2a14eb576f7276c0', 'bicheuxj@gmail.com', '721a9b52bfceacc503c056e3b9b93cfa', 'xml.dev');

$post = [
    'resume' => 'lololololol',
    'modes[0]' => '2',
    'genres[0]' => '1',
    'themes[0]' => '1',
    'editors[0]' => '1'
];

echo $curl->fetch($_POST['url']);

?>