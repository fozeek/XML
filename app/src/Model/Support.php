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
                        'model' => 'Developer'
                    ],
                'price',
                'businessModel',
                'test',
                'rates' => [
                        'type' => 'oneToMany',
                        'model' => 'Rate'
                    ],
                'medias' => [
                        'type' => 'oneToMany',
                        'model' => 'Media'
                    ],
                'commentaires' => [
                        'type' => 'oneToMany',
                        'model' => 'Commentaire'
                    ]
            ]
        ];
}