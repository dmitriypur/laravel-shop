<?php

namespace app\controllers;

use app\models\Mail;
use RedBeanPHP\R;

class PageController extends AppController
{
    public function saleAction()
    {
        $products = R::getAll("SELECT p.* FROM product p WHERE old_price != 0
        ORDER BY p.created_at DESC LIMIT 15");

        $this->setMeta('Акционные товары со скидкой | Интернет магазин фирменной обуви "Твои кроссовки"');
        $this->set(compact('products'));
    }

    public function pageAction()
    {
        $alias = $this->route['alias'];
        $page = R::findOne('page', "alias = ?", [$alias]);
        $this->setMeta($page->title);
        $this->set(compact('page'));
    }

    public function contactsAction()
    {
        if(!empty($_POST)){
            $mail = new Mail();
            $data = $_POST;
            $mail->load($data);
            if(!$mail->validate($data)){
                $errors = $mail->getAjaxErrors();
                echo $errors;
                exit;
            }
            $data = $mail->attributes;
            foreach($data as $k => $v){
                $_SESSION['message'][$k] = $v;
            }
            Mail::send($data);
            exit;
        }
        $page = R::findOne('page', "alias = ?", ['contacts']);
        $this->setMeta('Контакты | Интернет магазин фирменной обуви "Твои кроссовки"');
        $this->set(compact('page'));
    }
}