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

    public function delete($id)
    {
        return $this->db->query('DELETE FROM '.$this->getName().' WHERE id='.intval($id));
    }

    public function update($id, $data)
    {
        $string = [];
        foreach ($variable as $key => $value) {
            $string[] = $key.', '.$value;
        }
        return $this->db->query('UPDATE '.$this->getName().' SET '.implode(' ', $string).' WHERE id='.intval($id));
    }

    public function find($id)
    {
        return $this->db->query('SELECT * FROM '.$this->getName().' WHERE id='.intVal($id));
    }

    public function findAll()
    {
        return $this->db->query('SELECT * FROM '.$this->getName());
    }

    private function decorate($object)
    {
        
    }

}