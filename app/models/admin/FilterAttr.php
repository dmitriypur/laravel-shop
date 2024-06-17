<?php

namespace app\models\admin;

use app\models\AppModel;

class FilterAttr extends AppModel
{
    public array $attributes = [
        'value' => '',
        'attr_group_id' => '',
    ];
    public array $rules = [
        'required' => [
            ['value'],
            ['attr_group_id'],
        ],
        'integer' => [
            ['attr_group_id'],
        ]
    ];
}