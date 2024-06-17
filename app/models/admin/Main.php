<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;

class Main extends AppModel
{
    public array $attributes = [
        'phone' => '',
        'email' => '',
        'base_color' => '',
        'address' => '',
        'seo_text' => '',
    ];
}