<?php

namespace app\models;

class Cart extends AppModel
{
    public function addToCart($product, $qty = 1, $mod = null)
    {
        $price = $product->price;

        if($mod){
            $ID = "{$product->id}-{$mod->id}";
            $title = "{$product->title} (Размер: {$mod->value})";
        }else{
            $ID = $product->id;
            $title = $product->title;
        }

        if(isset($_SESSION['cart'][$ID])){
            $_SESSION['cart'][$ID]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$ID] = [
                'qty' => $qty,
                'title' => $title,
                'alias' => $product->alias,
                'price' => $price,
                'img' => $product->img
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + ($price * $qty) : $price * $qty;
    }

    public function deleteItem($id){
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['qty'];
        unset($_SESSION['cart'][$id]);
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
    }

    public function updateItem($id, $qty){
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['qty'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;

        $_SESSION['cart'][$id]['qty'] = $qty;
        $_SESSION['cart.qty'] += $qty;
        $_SESSION['cart.sum'] += $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['qty'];

        debug($_SESSION['cart.qty']);
        debug($_SESSION['cart.sum']);
    }
}