<?php

namespace Rest;

use SimpleXMLElement;

class Xml
{
    public static function xmlToArray($dom)
    {

        // validation à partir de la DTD référencée dans le document.
        // En cas d'erreur, on ne va pas plus loin
        // if (!@$dom->validate()) {
        //   return false;
        // }

        // création de l'objet résultat
        $object = [];

        // on récupère l'élément racine, on le met dans un membre
        // de l'objet nommé "root"
        $root = $dom->documentElement;
        $object['root'] = [];

        // appel d'une fonction récursive qui traduit l'élément XML
        // et passe la main à ses enfants, en parcourant tout l'arbre XML.
        self::getElement($root, $object['root']);

        return $object;
    }

    private static function getElement($dom, &$array)
    {
        // récupération du nom de l'élément
        $array['name'] = $dom->nodeName;

        // récupération de la valeur CDATA,
        // en supprimant les espaces de formatage.
        if ($dom->firstChild != null) {
            $array['textValue'] = trim($dom->firstChild->nodeValue);
        }

        // Récupération des attributs
        if ($dom->hasAttributes()) {
            $array['attributes'] = [];
            foreach ($dom->attributes as $attName => $dom_attribute) {
                $array['attributes'][$attName] = $dom_attribute->value;
            }
        }

        // Récupération des éléments fils, et parcours de l'arbre XML
        // on veut length >1 parce que le premier fils est toujours
        // le noeud texte
        if ($dom->childNodes->length > 1) {
            $array['children'] = [];
            foreach ($dom->childNodes as $dom_child) {
                if ($dom_child->nodeType == XML_ELEMENT_NODE) {
                    $child_object = [];
                    self::getElement($dom_child, $child_object);
                    array_push($array['children'], $child_object);
                }
            }
        }
    }

    public static function arrayToXml($array)
    {
        $dom = new SimpleXMLElement('<'.$array['root']['name'].'></'.$array['root']['name'].'>');
        if (isset($array['root']['children']) && count($array['root']['children'])>0) {
            foreach ($array['root']['children'] as $childArray) {
                self::setElement($childArray, $dom);
            }
        }

        return $dom;
    }

    public static function setElement($array, $element)
    {
        // récupération de la valeur CDATA de l'élément
        if (isset($array['textValue'])) {
            $child = $element->addChild($array['name'], $array['textValue']);
        } else {
            $child = $element->addChild($array['name']);
        }

        // récupération des attributs
        if (isset($array['attributes'])) {
            foreach ($array['attributes'] as $attName => $attValue) {
                $child->addAttribute($attName, $attValue);
            }
        }

        // construction des éléments fils, et parcours de l'arbre
        if (isset($array['children']) && count($array['children'])>0) {
            foreach ($array['children'] as $childArray) {
                self::setElement($childArray, $child);
            }
        }
    }

    public static function check($xml, $xsd)
    {
        // Enable user error handling
        libxml_use_internal_errors(true);

        $errors = [];
        if (!$xml->schemaValidate($xsd)) {
            $errors[] = self::libxml_display_errors();
        }

        return $errors;
    }

    private static function libxml_display_error($error)
    {
        $return = '';
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

    private static function libxml_display_errors()
    {
        $errors = libxml_get_errors();
        $return = [];
        foreach ($errors as $error) {
            $return[] = self::libxml_display_error($error);
        }
        libxml_clear_errors();

        return $return;
    }
}
