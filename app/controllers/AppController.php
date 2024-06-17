<?php

namespace app\controllers;

use app\models\AppModel;
use app\models\Wishlist;
use ishop\App;
use ishop\base\Controller;
use ishop\Cache;
use RedBeanPHP\R;

class AppController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('cats', self::cacheCategory());
        App::$app->setProperty('brands', self::cacheBrands());
        App::$app->setProperty('prices', self::getPrices());
        App::$app->setProperty('wishlist', Wishlist::get_wishlist_ids());
    }

    public static function cacheCategory(){
        $cache = Cache::instance();
        $cats = $cache->get('cats');
        if(!$cats){
            $cats = R::getAssoc("SELECT * FROM category");
            $cache->set('cats', $cats);
        }
        return $cats;
    }

    public static function cacheBrands(){
        $cache = Cache::instance();
        $brands = $cache->get('brands');
        if(!$brands){
            $brands = R::getAssoc("SELECT * FROM brand");
            $cache->set('brands', $brands);
        }
        return $brands;
    }

    public static function getPrices()
    {
        $prices = R::getAll("SELECT MIN(p.price) as `min_price`, MAX(p.price) as `max_price` FROM product p");
        return $prices;
    }
}