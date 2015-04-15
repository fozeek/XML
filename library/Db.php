<?php

namespace Rest;

use PDO;

class Db
{

    private $connection;

    public function __construct($access)
    {
        $this->connect($access);
    }

    private function connect($access)
    {
        try {
            $this->connection = new PDO('mysql:host='.$access["host"].';dbname='.$access["database"], $access["user"], $access["password"], array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('error db connect');
            return false;
        }
        return true;
    }

    public function query($requete)
    {
        return $this->connection->query($requete)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function exec($requete)
    {
        return $this->connection->exec($requete);
    }

}