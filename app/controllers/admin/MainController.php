<?php

namespace app\controllers\admin;

use app\models\admin\Main;
use ishop\App;
use ishop\Cache;
use RedBeanPHP\R;

class MainController extends AppController
{

    public function indexAction(){
        if(!empty($_POST)){
            $main = new Main();
            $data = $_POST;
            $main->load($data);

            if (!$main->validate($data)) {
                $main->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if ($main->update('settings', 1)) {
                $cache = Cache::instance();
                $cache->delete('settings');
                $m = R::load('settings', 1);
                R::store($m);
                $cache->set('settings', $data);
                $_SESSION['success'] = "Настройки сохранены";
                redirect();
            }
        }

        $orders = R::count('order', "status = '0'");
        $users = R::count('user', 'role = "user"');
        $categories = R::count('category');
        $products = R::count('product', "status = '1'");
        $settings = R::load('settings', 1);
        $this->setMeta('Панель управления');
        $this->set(compact('orders', 'users', 'products', 'categories', 'settings'));
    }
}