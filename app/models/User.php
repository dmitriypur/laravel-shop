<?php

namespace app\models;

use RedBeanPHP\R;

class User extends AppModel
{

    public array $attributes = [
        'login' => '',
        'phone' => '',
        'password' => '',
        'email' => '',
        'name' => '',
        'address' => '',
        'role' => 'user',
    ];

    public array $rules = [
        'required' => [
            ['phone'],
            ['password'],
            ['email'],
            ['name'],
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['password', 6],
            ['name', 2],
            ['phone', 5]
        ],
        'numeric' => [
            ['phone']
        ]
    ];

    public function checkUnique()
    {
        $user = R::findOne('user', "email = ?", [$this->attributes['email']]);
        if ($user) {
            if ($user->email == $this->attributes['email']) {
                $this->errors['unique'][] = 'Этот email уже занят';
            }
            return false;
        }

        return true;
    }

    public function login($isAdmin = false){
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;

        if($login && $password){
            if($isAdmin){
                $user = R::findOne('user', "login = ? AND role = 'admin'", [$login]);
            }else{
                $user = R::findOne('user', "login = ?", [$login]);
            }

            if($user){
                if(password_verify($password, $user->password)){
                    foreach ($user as $k => $v){
                        if($k != 'password'){
                            $_SESSION['user'][$k] = $v;
                        }
                    }
                    return true;
                }
            }
        }
        return false;
    }

    public static function checkAuth(){
        return isset($_SESSION['user']);
    }

    public static function isAdmin(){
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
    }

}