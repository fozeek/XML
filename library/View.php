<?php

namespace Rest;

class View
{
    private $format = 'json';
    private $code = 200;
    private $check = true;

    protected $messages = array(
        // INFORMATIONAL CODES
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        // SUCCESS CODES
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-status',
        208 => 'Already Reported',
        // REDIRECTION CODES
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Switch Proxy', // Deprecated
        307 => 'Temporary Redirect',
        // CLIENT ERROR
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Time-out',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested range not satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Unordered Collection',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        // SERVER ERROR
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Time-out',
        505 => 'HTTP Version not supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        511 => 'Network Authentication Required',
    );

    public function __construct($format)
    {
        $this->format = $format;
    }

    public function check($bool)
    {
        $this->check = $bool;
    }

    public function render($data = [], $code = 200)
    {
        $this->code = $code;
        if (count($data) > 0) {
            $content = $this->factory($this->format, $data);
        } else {
            $content = $this->factory($this->format, $this->getErrorArray($code));
        }
        header("HTTP/1.0 ".$this->code." ".$this->getMessage($code));
        header('Content-Type: application/'.$this->format);
        echo $content;
        die;
    }

    private function getMessage($code)
    {
        return $this->messages[$code];
    }

    private function factory($format, $data)
    {
        if ($format == 'json') {
            return json_encode($data, JSON_PRETTY_PRINT);
        } else {
            $xml = Xml::arrayToXml(['root' => $data]);
            if ($this->check && $this->code == 200) {
                $domXML = new \DOMDocument();
                $domXML->loadXML($xml->asXML());
                $errors = Xml::check($domXML, 'data/gamelist.xsd');
                if (count($errors)>0) {
                    $this->code = 500;
                    $xml = Xml::arrayToXml(['root' => $this->getErrorArray($this->code)]);
                }
            }

            return $xml->saveXML();
        }
    }

    private function getErrorArray($code)
    {
        return ['name' => 'error', 'children' => [['name' => 'code', 'textValue' => $code], ['name' => 'message', 'textValue' => $this->getMessage($code)]]];
    }
}
