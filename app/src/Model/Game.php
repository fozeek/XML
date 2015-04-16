<?php

namespace App\Model;

use Rest\Db\Model;

class Game extends Model
{
    protected $attrs = [
        'attribut' => [
            'id'
        ],
        'balise' => [
            'title',
            'modes' => array(

                ),
            'resume',
            'description',
            'genres' => array(

                ),
            'themes' => array(

                ),
            'officialWebsite',
            'supports' => array(

                ),
            'medias' => array(

                ),
            'commentaires' => array(

                ),
        ],
    ];
}