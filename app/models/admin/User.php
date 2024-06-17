<?php

namespace app\models\admin;

use RedBeanPHP\R;

class User extends \app\models\User
{
    public array $attributes = [
        'id' => '',
        'login' => '',
        'phone' => '',
        'password' => '',
        'email' => '',
        'name' => '',
        'address' => '',
        'role' => '',
    ];

    public array $rules = [
        'required' => [
            ['phone'],
            ['email'],
            ['name'],
            ['role'],
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['name', 2],
            ['phone', 5]
        ],
        'numeric' => [
            ['phone']
        ]
    ];

    public function checkUnique()
    {
        $user = R::findOne('user', "email = ? AND id <> ?", [$this->attributes['email'], $this->attributes['id']]);
        if ($user) {
            if ($user->email == $this->attributes['email']) {
                $this->errors['unique'][] = 'Этот email уже занят';
            }
            return false;
        }

        return true;
    }
}