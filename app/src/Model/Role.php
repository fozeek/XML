<?php

namespace App\Model;

use Rest\Db\Model;

class Role extends Model
{
    protected $attrs = [
        'attribut' => [
            'id',
            'group_name',
        ],
        'balise' => [
            'access' => [
                    'type' => 'manyToMany',
                    'table' => 'role_access',
                    'model' => 'access',
                ],
        ],
    ];
}
