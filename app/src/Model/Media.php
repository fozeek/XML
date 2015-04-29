<?php

namespace App\Model;

use Rest\Db\Model;

class Media extends Model
{
    protected $attrs = [
        'attribut' => [
            'id',
            'type',
            'src',
            'title',
        ],
        'balise' => [
            'description',
            'commentaires' => [
                    'type' => 'manyToMany',
                    'table' => 'media_commentaire',
                    'model' => 'commentaire',
                ],
        ],
    ];
}
