<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;

class Page extends AppModel
{
    public array $attributes = [
        'title' => '',
        'alias' => '',
        'content' => '',
    ];

    public array $rules = [
        'required' => [
            ['title'],
        ],
    ];
}