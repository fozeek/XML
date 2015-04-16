<?php

namespace App\Model;

use Rest\Db\Model;

class Developer extends Model
{
    protected $attrs = [
        'attribut' => [
            'id'
        ],
        'contenu' => 'text'
    ];
}