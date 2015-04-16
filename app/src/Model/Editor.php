<?php

namespace App\Model;

use Rest\Db\Model;

class Editor extends Model
{
    protected $attrs = [
        'attribut' => [
            'id'
        ],
        'contenu' => 'text',
    ];
}