<?php

namespace app\controllers;

use app\models\Wishlist;

/**@property Wishlist */
class WishlistController extends AppController
{

    public function indexAction()
    {
        $products = (new Wishlist())->get_wishlist_products();
        $this->setMeta('Список избранных товаров');
        $this->set(compact('products'));
    }

    public function addAction()
    {
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            $answer = ['result' => 'error', 'text' => 'Ошибка добавления товара в избранное!'];
            exit(json_encode($answer));
        }
        $wl = new Wishlist();
        $product = $wl->get_product($id);
        if ($product) {
            $wl->add_to_wishlist($id);
            $answer = ['result' => 'success', 'text' => 'Товар добавлен в избранное!'];
        } else {
            $answer = ['result' => 'error', 'text' => 'Ошибка добавления товара в избранное!'];
            exit(json_encode($answer));
        }
        exit(json_encode($answer));
    }

    public function deleteAction()
    {
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        $wl = new Wishlist();
        if ($wl->delete_from_wishlist($id)) {
            $answer = ['result' => 'success', 'text' => 'Товар удален из избранного!'];
            exit(json_encode($answer));
        }else{
            $answer = ['result' => 'error', 'text' => 'Ошибка удаления товара из избранного!'];
            exit(json_encode($answer));
        }
    }
}