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
            'modes' => [
                    'type' => 'manyToMany',
                    'table' => 'game_mode',
                    'model' => 'Mode'
                ],
            'resume',
            'description',
            'genres' => [
                    'type' => 'manyToMany',
                    'table' => 'game_genre',
                    'model' => 'Genre'
                ],
            'themes' => [
                    'type' => 'manyToMany',
                    'table' => 'game_theme',
                    'model' => 'Theme'
                ],
            'officialWebsite',
            'supports' => [
                    'type' => 'oneToMany',
                    'model' => 'Support'
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