<?php

error_reporting(E_ALL);
ini_set('display_errors', 1); 

//header('Content-Type: application/xml; charset=utf-8');

require 'Curl.php';

$curl = new Curl('toto', 'f02368945726d5fc2a14eb576f7276c0', 'toto@gmail.com', '721a9b52bfceacc503c056e3b9b93cfa', 'localhost');

if(isset($_POST['data'])) {
    $data = $_POST['data'];
} else {
    $data = false;
}

var_dump($data);die;

$delete = isset($_POST['method']) && $_POST['method'] == 'DELETE';

echo $curl->fetch($_POST['endpoint'], $data, $delete);

?>