<?php

namespace Rest;

use DOMDocument;
use SimpleXMLElement;

class Xml
{

    public function check()
    {
        // Enable user error handling
        libxml_use_internal_errors(true);

        $xml = new DOMDocument(); 
        $xml->load('example.xml'); 

        $errors = [];
        if (!$xml->schemaValidate('data/games.xsd')) {
            $errors[] = libxml_display_errors();
        }
        return $errors;
    }

    public function getXML($file)
    {
        return new SimpleXMLElement($file);
    }

    public function xmlToArray($fileName) {
 
        // création du nouvel objet document
        $dom = new DomDocument();
     
        // chargement à partir du fichier
        $dom->load($fileName);
     
        // validation à partir de la DTD référencée dans le document.
        // En cas d'erreur, on ne va pas plus loin
        if (!@$dom->validate()) {
          return false;
        }
     
        // création de l'objet résultat
        $object = new stdClass();
     
        // on référence l'adresse du fichier source
        $object->source = $fileName;
     
        // on récupère l'élément racine, on le met dans un membre
        // de l'objet nommé "root"
        $root = $dom->documentElement;
        $object->root = new stdClass();
     
        // appel d'une fonction récursive qui traduit l'élément XML
        // et passe la main à ses enfants, en parcourant tout l'arbre XML.
        $this->getElement($root, $object->root);
     
        return $object;
    }

    private function getElement($dom_element, $object_element)
    {
        // récupération du nom de l'élément
        $object_element->name = $dom_element->nodeName;
     
        // récupération de la valeur CDATA, 
        // en supprimant les espaces de formatage.
        $object_element->textValue = trim($dom_element->firstChild->nodeValue);
     
        // Récupération des attributs
        if ($dom_element->hasAttributes()) {
            $object_element->attributes = array();
            foreach($dom_element->attributes as $attName=>$dom_attribute) {
                $object_element->attributes[$attName] = $dom_attribute->value;
            }
        }
     
        // Récupération des éléments fils, et parcours de l'arbre XML
        // on veut length >1 parce que le premier fils est toujours 
        // le noeud texte
        if ($dom_element->childNodes->length > 1) {
            $object_element->children = array();
            foreach($dom_element->childNodes as $dom_child) {
                if ($dom_child->nodeType == XML_ELEMENT_NODE) {
                    $child_object = new stdClass();
                    $this->getElement($dom_child, $child_object);
                    array_push($object_element->children, $child_object);
                }
            }
        }
    }

    static public function arrayToXml($array) {
        // Création d'un nouvel objet document
        $dom = new SimpleXMLElement('<'.$array['root']['name'].'></'.$array['root']['name'].'>');
     
        // // Création de l'élément racine
        $root = $dom->addChild($array['root']['name']);
        // $dom->appendChild($root);
     
        // appel d'une fonction récursive qui construit l'élément XML
        // à partir de l'objet, en parcourant tout l'arbre de l'objet.
        self::setElement($array['root'], $root);
     
        // Mise à jour du fichier source original
        return $dom->saveXML();
    }

    static function setElement($array, $element) {
        // récupération de la valeur CDATA de l'élément
        if (isset($array['textValue'])) {
            $child = $element->addChild($array['name'], $array['textValue']);
        } else {
            $child = $element->addChild($array['name']);
        }

        // récupération des attributs
        if (isset($array['attributes'])) {
            foreach($array['attributes'] as $attName=>$attValue) {
                $child->addAttribute($attName, $attValue);
            }
        }

        // construction des éléments fils, et parcours de l'arbre
        if (isset($array['children']) && count($array['children'])>0) {
            foreach($array['children'] as $childArray) {
                self::setElement($childArray, $child);       
            }
        }   
    }

    private function libxml_display_error($error)
    {
        switch ($error->level) {
            case LIBXML_ERR_WARNING:
                $return .= "<b>Warning $error->code</b>: ";
                break;
            case LIBXML_ERR_ERROR:
                $return .= "<b>Error $error->code</b>: ";
                break;
            case LIBXML_ERR_FATAL:
                $return .= "<b>Fatal Error $error->code</b>: ";
                break;
        }
        $return .= trim($error->message);
        if ($error->file) {
            $return .=    " in <b>$error->file</b>";
        }
        $return .= " on line <b>$error->line</b>";

        return $return;
    }

    private function libxml_display_errors() {
        $errors = libxml_get_errors();
        foreach ($errors as $error) {
            print libxml_display_error($error);
        }
        libxml_clear_errors();
    }

}