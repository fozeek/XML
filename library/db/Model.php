<?php

namespace Rest\Db;

class Model
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getName()
    {
        $class = explode('\\', strtolower(get_class($this)));
        return end($class);
    }

    public function create($data)
    {
        return $this->db->query('INSERT INTO '.$this->getName().' ('.explode(',', keys($data)).') VALUES ('.explode(',', $data).')');
    }

    public function update($data)
    {
        $string = [];
        foreach ($variable as $key => $value) {
            $string[] = $key.', '.$value;
        }
        return $this->db->query('UPDATE '.$this->getName().' SET '.implode(' ', $string));
    }

    public function find($id)
    {
        return $this->db->query('SELECT * FROM '.$this->getName().' WHERE id='.intVal($id));
    }

    public function findAll()
    {
        return $this->db->query('SELECT * FROM '.$this->getName());
    }

}