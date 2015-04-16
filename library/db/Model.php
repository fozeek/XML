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
        return $this->decorate($this->db->query('SELECT * FROM '.$this->getName().' WHERE id='.intval($id)));
    }

    public function findAll()
    {
        $return = [];
        foreach ($this->db->query('SELECT * FROM '.$this->getName()) as $object) {
            $return[] = $this->decorate($object);
        }
        return $return;
    }

    private function decorate($object)
    {
        // if($this->db->getFormat() != 'xml') {
        //     return $object;
        // }

        $return = [];
        $return['name'] = $this->getName();
        $return['attributes'] = [];
        if(isset($this->attrs['attribut'])) {
            foreach ($this->attrs['attribut'] as $key => $value) {
                $return['attributes'][$value] = $object[$this->camelcaseToBad($value)];
            }
        }
        $return['children'] = [];
        if(isset($this->attrs['balise'])) {
            foreach ($this->attrs['balise'] as $key => $value) {
                if(!is_array($value)) {
                    $return['children'][] = ['name' => $value, 'textValue' => $object[$this->camelcaseToBad($value)]];
                }
                else {
                    if($value['type'] == 'manyToMany') {
                        $res = $this->db->query("SELECT * FROM ".$value['table']." WHERE ".$this->getName()."_id = ".intval($object['id']));
                        $ids = [];
                        foreach ($res as $join) {
                            $ids[] = intval($join[$value['model'].'_id']);
                        }
                        if(count($ids)>0) {
                            $children = $this->db->get($value['model'])->findByIds($ids);
                        } else {
                            $children = [];
                        }
                    } elseif ($value['type'] == 'oneToMany') {
                        $children = $this->db->get($value['model'])->findBy([$this->getName().'_id' => $object['id']]);
                    }
                    $return['children'][] = ['name' => $this->camelcaseToBad($key), 'children' => $children];
                }
            }
        }
        if(isset($this->attrs['contenu'])) {
            $return['textValue'] = $object[$this->attrs['contenu']];
        }
        return $return;
    }

    public function findByIds($ids)
    {
        $return = [];
        foreach ($this->db->query('SELECT * FROM '.$this->getName().' WHERE id IN ('.implode(', ', $ids).')') as $object) {
            $return[] = $this->decorate($object);
        }
        return $return;
    }

    public function findBy($attrs)
    {
        $string = [];
        foreach ($attrs as $key => $value) {
            $string[] = $key.' = '.$value;
        }
        $return = [];
        foreach ($this->db->query('SELECT * FROM '.$this->getName().' WHERE  '.implode(', ', $string)) as $object) {
            $return[] = $this->decorate($object);
        }
        return $return;
    }

    private function camelcaseToBad($string)
    {
        $return = '';
        foreach (str_split($string) as $key => $value) {
            if(ord($value)>=65 && ord($value)<=90) {
                $value = '_'.strtolower($value);
            }
            $return .= $value;
        }
        return $return;
    }

}