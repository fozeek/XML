<?php

namespace Rest;

use PDO;

class Db
{
    private $connection;
    private $models;
    private $format;

    public function __construct($access, $models, $format)
    {
        $this->format = $format;
        $this->connect($access);
        $this->loadModels($models);
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

    public function getLastInsertId() 
    {
        return $this->connection->lastInsertId();
    }

    public function getFormat()
    {
        return $this->format;
    }

    private function loadModels($models)
    {
        foreach ($models as $name => $class) {
            $this->models[$name] = new $class($this);
        }
    }

    public function query($requete)
    {
        return $this->connection->query($requete)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function exec($requete)
    {
        return $this->connection->exec($requete);
    }

    public function get($model)
    {
        if(!isset($this->models[$model])) {
            return false;
        }
        return $this->models[$model];
    }
}
