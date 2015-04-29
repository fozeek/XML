<?php

namespace App\Model;

use Rest\Db\Model;

class Access extends Model
{
    protected $attrs = [
        'attribut' => [
            'id',
            'name',
        ],
    ];
}
