<?php

namespace App\Model;

use Rest\Db\Model;

class User extends Model
{
    protected $attrs = [
            'attribut' => [
                'name',
                'mail',
                'app_id',
                'app_secret',
                'host',
            ],
        ];
}
