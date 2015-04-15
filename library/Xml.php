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