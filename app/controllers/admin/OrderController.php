<?php

namespace app\controllers\admin;

use ishop\libs\Pagination;
use RedBeanPHP\R;

class OrderController extends AppController
{

    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 3;
        $count = R::count('order');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $orders = R::getAll("SELECT `order`.id, `order`.user_id, `order`.status, `order`.date, `order`.update_at, user.name, SUM(op.price) AS `sum` FROM `order`
        JOIN `user` ON `order`.user_id = user.id
        JOIN order_product op on `order`.id = op.order_id
        GROUP BY `order`.id ORDER BY `order`.status AND `order`.id LIMIT $start, $perpage");

        $this->setMeta('Список заказов');
        $this->set(compact('orders', 'pagination', 'count'));
    }

    public function viewAction()
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

//        $order_products = R::findAll("order_product", "order_id = ?", [$order_id]);

        $order_products = R::getAll("SELECT op.*, p.alias FROM order_product op
        JOIN product p on p.id = op.product_id
        WHERE op.order_id = ?", [$order_id]);

        $this->setMeta("Заказ №($order_id)");
        $this->set(compact('order', 'order_products'));
    }


    public function changeAction(){
        $order_id = $this->getRequestId();
        $status = !empty($_GET['status']) ? 1 : 0;
        $order = R::load('order', $order_id);
        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }
        $order->status = $status;
        $order->update_at = date("Y-m-d H:i:s");
        $res = R::store($order);

        $_SESSION['success'] = 'Изменения сохранены';
        redirect();
    }

    public function deleteAction()
    {
        $order_id = $this->getRequestId();
        $order = R::load('order', $order_id);
        R::trash($order);
        $_SESSION['success'] = 'Заказ удален';
        redirect(ADMIN . '/order');
    }

}