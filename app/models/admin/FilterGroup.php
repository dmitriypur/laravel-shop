<?php

namespace app\models\admin;

use app\models\AppModel;

class FilterGroup extends AppModel
{
    public array $attributes = [
        'title' => '',
        'alias' => '',
        'type_inp' => '',
        'active' => '',
    ];
    public array $rules = [
        'required' => [
            ['title'],
            ['alias'],
            ['type_inp']
        ]
    ];
}