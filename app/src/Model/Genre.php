<?php

namespace App\Model;

use Rest\Db\Model;

class Genre extends Model
{
    protected $attrs = [
        'attribut' => [
            'id'
        ],
        'contenu' => 'text',
    ];
}