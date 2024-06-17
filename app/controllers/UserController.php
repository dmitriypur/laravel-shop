<?php

namespace app\controllers;

use app\models\User;
use RedBeanPHP\R;

class UserController extends AppController
{

    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $data['login'] = $data['email'];
            $user->load($data);

            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if($id = $user->save('user')){
                    $_SESSION['success'] = 'Пользователь зарегистрирован';
                    if(!isset($_POST['add-user'])) {
                        $_SESSION['user']['id'] = $id;
                        foreach ($data as $k => $v) {
                            if ($k != 'password') {
                                $_SESSION['user'][$k] = $v;
                            }
                        }
                    }
                    unset($_SESSION['form_data']);
                }else{
                    $_SESSION['error'] = 'Ошибка';
                }
            }
            if(isset($_POST['add-user'])) {
                redirect(ADMIN);
            }
            redirect(PATH);
        }

        $this->setMeta('Регистрация');
    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'Вы успешно авторизованы!';
                redirect(PATH . '/user/cabinet');
            }else{
                $_SESSION['error'] = 'Логин, или пароль введены не верно!';
            }
            redirect(PATH);
        }
        $this->setMeta('Авторизация');
    }

    public function logoutAction()
    {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        redirect(PATH . '/user/login');
    }

    public function cabinetAction()
    {
        if(!User::checkAuth()) redirect();
        $user = R::findOne('user', "id = ?", [$_SESSION['user']['id']]);
        $user_id = $_SESSION['user']['id'];

        $orders = R::getAll("SELECT o.id, o.user_id, o.status, o.date, o.update_at, SUM(op.price) AS `sum` FROM `order` o
        JOIN order_product op on o.id = op.order_id
        WHERE user_id = $user_id GROUP BY o.id ORDER BY o.status AND o.id");
        $this->setMeta('Личный кабинет');
        $this->set(compact('user', 'orders'));

    }

    public function orderProductsAction()
    {
        $order_id = $this->getRequestId();
        $order = R::getRow("SELECT `order`.*, u.name, SUM(op.price) AS `sum` FROM `order`
        JOIN user u ON `order`.user_id = u.id
        JOIN order_product op on `order`.id = op.order_id
        WHERE `order`.id = ?
        GROUP BY `order`.id ORDER BY `order`.id LIMIT 1", [$order_id]);

        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }

        $order_products = R::getAll("SELECT op.*, p.alias FROM order_product op
        JOIN product p on p.id = op.product_id
        WHERE op.order_id = ?", [$order_id]);

        $this->setMeta("Заказ №($order_id)");
        $this->set(compact('order', 'order_products'));
    }

    public function editAction()
    {
        if(!User::checkAuth()) redirect('/user/login');
        if(!empty($_POST)){
            $user = new \app\models\admin\User();
            $data = $_POST;
            $data['login'] = $data['email'];
            $data['id'] = $_SESSION['user']['id'];
            $data['role'] = $_SESSION['user']['role'];
            $user->load($data);
            if(!$user->attributes['password']){
                unset($user->attributes['password']);
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }

            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                redirect();
            }

            if($user->update('user', $_SESSION['user']['id'])){
                foreach ($user->attributes as $k => $v) {
                    if ($k != 'password') {
                        $_SESSION['user'][$k] = $v;
                    }
                }
                $_SESSION['success'] = 'Данные сохранены';
            }else{
                $_SESSION['error'] = 'Ошибка';
            }
            redirect();
        }
    }

    public function subscriptionAction(){
        $data = $_POST;
        if(isset($data['email']) && !empty($data['email'])){
            $user = R::findOne('subscription', "email = ?", [$data['email']]);
            if ($user) {
                if ($user->email == $data['email']) {
                    echo "Email <b>{$data['email']}</b> уже есть в базе";
                }
                die;
            }
            $tbl = R::dispense('subscription');
            $tbl->email = $data['email'];
            R::store($tbl);
            echo 'Success';
            die;
        }
        echo "Error";
    }

}