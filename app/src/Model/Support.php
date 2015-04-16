<?php

namespace App\Model;

use Rest\Db\Model;

class Support extends Model
{
    protected $attrs = [
            'attribut' => [
                'id',
                'name',
                'owner',
                'consoleYear'
            ],
            'balise' => [
                'releaseDate',
                'developers' => [
                        'type' => 'manyToMany',
                        'table' => 'support_developer',
                        'model' => 'developer'
                    ],
                'price',
                'businessModel',
                'test',
                'rates' => [
                        'type' => 'oneToMany',
                        'model' => 'rate'
                    ],
                'medias' => [
                        'type' => 'oneToMany',
                        'model' => 'media'
                    ],
                'commentaires' => [
                        'type' => 'oneToMany',
                        'model' => 'commentaire'
                    ]
            ]
        ];
}