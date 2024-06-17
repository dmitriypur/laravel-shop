<?php

namespace app\models;

use RedBeanPHP\R;

class Wishlist extends AppModel
{
    public function get_product($id)
    {
        return R::getCell("SELECT id FROM product WHERE status = 1 AND id = ?", [$id]);
    }

    public function add_to_wishlist($id)
    {
        $wishlist = self::get_wishlist_ids();
        if(!$wishlist){
            setcookie('wishlist', $id, time() + 3600*24*7*30, '/');
        }else{
            if(!in_array($id, $wishlist)){
//                if(count($wishlist) > 5){
//                    array_shift($wishlist);
//                }
                $wishlist[] = $id;
                $wishlist = implode(',', $wishlist);
                setcookie('wishlist', $wishlist, time() + 3600*24*7*30, '/');
            }
        }
    }

    public static function get_wishlist_ids()
    {
        $wishlist = $_COOKIE['wishlist'] ?? '';
        if($wishlist){
            $wishlist = explode(',', $wishlist);
        }
        if(is_array($wishlist)){
//            $wishlist = array_slice($wishlist, 0, 6);
            $wishlist = array_map('intval', $wishlist);
            return $wishlist;
        }
        return [];
    }

    public function get_wishlist_products()
    {
        $wishlist = self::get_wishlist_ids();
        if($wishlist){
            $wishlist = implode(',', $wishlist);
            return R::getAll("SELECT * FROM product WHERE status = 1 AND id IN ($wishlist)");
        }
        return [];
    }

    public function delete_from_wishlist($id)
    {
        $wishlist = self::get_wishlist_ids();
        $key = array_search($id, $wishlist);
        if(false !== $key){
            unset($wishlist[$key]);
            if($wishlist){
                $wishlist = implode(',', $wishlist);
                setcookie('wishlist', $wishlist, time() + 3600*24*7*30, '/');
            }else{
                setcookie('wishlist', '', time()-3600, '/');
            }
            return true;
        }

        return false;
    }
}