<?php

namespace app\controllers\admin;

use app\models\User;
use ishop\libs\Pagination;
use RedBeanPHP\R;

class UserController extends AppController
{

    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 20;
        $count = R::count('user');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $users = R::findAll('user', "LIMIT $start, $perpage");
        $this->setMeta('Список пользователей');
        $this->set(compact('users', 'pagination', 'count'));
    }

    public function editAction()
    {
        if(!empty($_POST)){
            $id = $this->getRequestId(false);
            $user = new \app\models\admin\User();
            $data = $_POST;
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
            if($user->update('user', $id)){
                $_SESSION['success'] = 'Изменения сохранены';
                redirect();
            }
        }
        $user_id = $this->getRequestId();
        $user = R::load('user', $user_id);

        $orders = R::getAll("SELECT o.id, o.user_id, o.status, o.date, o.update_at, SUM(op.price) AS `sum` FROM `order` o
        JOIN order_product op on o.id = op.order_id
        WHERE user_id = $user_id GROUP BY o.id ORDER BY o.status AND o.id");

        $this->setMeta("Пользователь {$user_id}");
        $this->set(compact('user', 'orders'));
    }

    public function addAction()
    {
        $this->setMeta("Новый пользователь");
    }

    public function deleteAction()
    {
        $id = $this->getRequestId();
        $user = R::load('user', $id);
        R::trash($user);
        $_SESSION['success'] = 'Пользователь удален';
        redirect(ADMIN . '/user');
    }

    public function loginAdminAction()
    {
        if(!empty($_POST)){
            $user = new User();
            if($user->login(true)){
                $_SESSION['success'] = 'Вы успешно авторизованы!';
            }else{
                $_SESSION['error'] = 'Логин, или пароль не верны!';
            }
            if(User::isAdmin()){
                redirect(ADMIN);
            }else{
                redirect();
            }
        }
        $this->layout = 'login';
        $this->setMeta('Авторизация');
    }

}