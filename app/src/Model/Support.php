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
                'developers' => array(

                ),
                'price',
                'businessModel',
                'test',
                'rates' => array(

                ),
                'medias' => array(

                ),
                'commentaires' => array(

                )
            ]
        ];
}