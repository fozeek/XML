<?php

namespace App\Model;

use Rest\Db\Model;

class Rate extends Model
{
    protected $attrs = [
        'attribut' => [
            'type'
        ],
        'contenu' => "text"
    ]
}