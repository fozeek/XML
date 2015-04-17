<?php

namespace App\Model;

use Rest\Db\Model;

class Commentaire extends Model
{
    protected $attrs = [
        'attribut' => [
            'userName',
            'date',
            'id',
        ],
        'contenu' => 'text',
    ];
}
