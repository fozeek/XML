<?php

namespace Rest\db;

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
        return $this->db->exec('INSERT INTO '.$this->getName().' ('.implode(',', array_keys($data)).') VALUES ('.implode(',', $this->factorData($data)).')');
    }

    public function delete($id)
    {
        return $this->db->query('DELETE FROM '.$this->getName().' WHERE id='.intval($id));
    }

    public function update($id, $data)
    {
        $string = [];
        foreach ($this->factorData($data) as $key => $value) {
            $string[] .= $key.' = '.$value;
        }
        return $this->db->exec('UPDATE '.$this->getName().' SET '.implode(', ', $string).' WHERE id='.intval($id));
    }

    private function factorData($data)
    {
        return array_map(function($value) {
            return is_string($value) ? "'".$value."'" : $value;
        }, $data);
    }

    public function updateFromXml($data)
    {
        $objectData = [];
        if (isset($this->attrs['contenu'])) {
            $objectData[$this->attrs['contenu']] = $data['textValue'];
        }
        if (isset($this->attrs['attribut'])) {
            foreach ($this->attrs['attribut'] as $key => $value) {
                $objectData[$value] = $data['attributes'][$value];
            }
        }
        if (isset($this->attrs['balise'])) {
            foreach ($this->attrs['balise'] as $key => $value) {
                if (!is_array($value)) {
                    $found = null;
                    foreach ($data['children'] as $child) {
                        if ($child['name'] == $value) {
                            if (isset($child['textValue'])) {
                                $found = $child['textValue'];
                            }
                        }
                    }
                    $objectData[$value] = $found;
                } else {
                    $found = false;
                    foreach ($data['children'] as $collection) {
                        if ($collection['name'] == $key) {
                            $found = $collection;
                        }
                    }
                    if (isset($found['children'])) {
                        foreach ($found['children'] as $child) {
                            $this->db->get($value['model'])->update($child);
                        }
                    }
                }
            }
        }

        $string = [];
        $id = $objectData['id'];
        unset($objectData['id']);
        foreach ($objectData as $key => $value) {
            if (is_string($value)) {
                $value = "'".$value."'";
            } elseif ($value === null) {
                $value = "NULL";
            }
            $string[] = $this->camelcaseToUnderscoreCase($key).' = '.$value;
        }

        return $this->db->exec('UPDATE '.$this->getName().' SET '.implode(', ', $string).' WHERE id='.intval($id));
    }

    public function find($id)
    {
        $object = $this->db->query('SELECT * FROM '.$this->getName().' WHERE id='.intval($id));
        if(count($object)>0) {
            return $this->decorate($object[0]);
        }
        return false;
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
        if (isset($this->attrs['attribut'])) {
            foreach ($this->attrs['attribut'] as $key => $value) {
                $return['attributes'][$value] = $object[$this->camelcaseToUnderscoreCase($value)];
            }
        }
        $return['children'] = [];
        if (isset($this->attrs['balise'])) {
            foreach ($this->attrs['balise'] as $key => $value) {
                if (!is_array($value)) {
                    $return['children'][] = ['name' => $value, 'textValue' => $object[$this->camelcaseToUnderscoreCase($value)]];
                } else {
                    if ($value['type'] == 'manyToMany') {
                        $res = $this->db->query("SELECT * FROM ".$value['table']." WHERE ".$this->getName()."_id = ".intval($object['id']));
                        $ids = [];
                        foreach ($res as $join) {
                            $ids[] = intval($join[$value['model'].'_id']);
                        }
                        if (count($ids)>0) {
                            $children = $this->db->get($value['model'])->findByIds($ids);
                        } else {
                            $children = [];
                        }
                    } elseif ($value['type'] == 'oneToMany') {
                        $children = $this->db->get($value['model'])->findBy([$this->getName().'_id' => $object['id']]);
                    } elseif ($value['type'] == 'manyToOne') {
                        $children = $this->db->get($value['model'])->findBy(['id' => $object['role_id']]);  
                    }
                    $return['children'][] = ['name' => $this->camelcaseToUnderscoreCase($key), 'children' => $children];
                }
            }
        }
        if (isset($this->attrs['contenu'])) {
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
            if (is_string($value)) {
                $value = "'".$value."'";
            }
            $string[] = $key.' = '.$value;
        }
        $return = [];
        foreach ($this->db->query('SELECT * FROM '.$this->getName().' WHERE  '.implode(' AND ', $string)) as $object) {
            $return[] = $this->decorate($object);
        }

        return $return;
    }

    private function camelcaseToUnderscoreCase($string)
    {
        $return = '';
        foreach (str_split($string) as $key => $value) {
            if (ord($value) >= 65 && ord($value) <= 90) {
                $value = '_'.strtolower($value);
            }
            $return .= $value;
        }

        return $return;
    }
}
