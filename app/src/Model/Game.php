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
                    'model' => 'mode'
                ],
            'resume',
            'description',
            'genres' => [
                    'type' => 'manyToMany',
                    'table' => 'game_genre',
                    'model' => 'genre'
                ],
            'themes' => [
                    'type' => 'manyToMany',
                    'table' => 'game_theme',
                    'model' => 'theme'
                ],
            'officialWebsite',
            'supports' => [
                    'type' => 'oneToMany',
                    'model' => 'support'
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