<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use app\models\User;
use RedBeanPHP\R;

class CartController extends AppController
{

    public function addAction(){
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? $_GET['qty'] : null;
        $mod_id = !empty($_GET['modSize']) ? $_GET['modSize'] : null;
        $mod = null;

        if($id){
            $product = R::findOne('product', "id = ?", [$id]);
            if(!$product){
                return false;
            }
            if($mod_id){
                $mod = R::findOne('attribute_value', 'id = ?', [$mod_id]);
            }
        }
        $cart = new Cart();
        $cart->addToCart($product, $qty, $mod);
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function indexAction(){
        $this->setMeta('Корзина');
    }

    public function showAction(){
        $this->loadView('cart_modal');
    }

    public function updateAction(){
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? $_GET['qty'] : null;

        $cart = new Cart();
        $cart->updateItem($id, $qty);

        if($this->isAjax()){
            $this->loadView('cart_page');
        }
        redirect();
    }

    public function deleteAction(){
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        $cart_view = !empty($_GET['cart']) ? $_GET['cart'] : null;
        if(isset($_SESSION['cart'][$id])){
            $cart = new Cart();
            $cart->deleteItem($id);
        }

        if($this->isAjax()){
            if($cart_view == 'modal'){
                $this->loadView('cart_modal');
            }else{
                $this->loadView('cart_page');
            }

        }
        redirect();
    }
    public function clearAction(){
        $cart_view = !empty($_POST['cart']) ? $_POST['cart'] : null;
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);

        if(!$cart_view){
            $this->loadView('cart_modal');
        }else{
            $this->loadView('cart_page');
        }

    }

    public function checkoutAction(){
        if(!empty($_POST)){
            // регистрация пользователя
            if(!User::checkAuth()){
                $user = new User();
                $data = $_POST;
                unset($data['note']);
                unset($data['payment']);
                unset($data['shipping']);
                $data['login'] = $data['email'];
                $user->load($data);
                if(!$user->validate($data) || !$user->checkUnique()){
                    $user->getErrors();
                    $_SESSION['form_data'] = $data;
                    redirect();
                }else{
                    $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                    if(!$user_id = $user->save('user')){
                        $_SESSION['error'] = 'Ошибка';
                        redirect();
                    }
                    $_SESSION['user']['id'] = $user_id;
                    foreach($data as $k => $v){
                        if($k != 'password'){
                            $_SESSION['user'][$k] = $v;
                        }
                    }
                }
            }

            // сохранение заказа
            $dataOrder['user_id'] = $user_id ?? $_SESSION['user']['id'];
            $dataOrder['note'] = !empty(trim($_POST['note'])) ? trim($_POST['note']) : '';
            $dataOrder['payment'] = !empty($_POST['payment']) ? $_POST['payment'] : '';
            $dataOrder['shipping'] = !empty($_POST['shipping']) ? $_POST['shipping'] : '';
            $user_email = $_SESSION['user']['email'] ?? $_POST['email'];

            $order = new Order();
            $order_id = $order->saveOrder($dataOrder);
            Order::mailOrder($order_id, $user_email);
        }
        redirect();
    }

}