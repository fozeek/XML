<?php

namespace App\Model;

use Rest\Db\Model;

class Mode extends Model
{
    protected $attrs = [
        'attribut' => [
            'id'
        ],
        'contenu' => 'text'
    ];
}