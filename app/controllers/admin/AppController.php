<?php

namespace app\controllers\admin;

use app\models\AppModel;
use app\models\User;
use ishop\App;
use ishop\base\Controller;
use ishop\Cache;
use RedBeanPHP\R;

class AppController extends Controller
{

    public $layout = 'admin';

    public function __construct($route){
        parent::__construct($route);
        if(!User::isAdmin() && $route['action'] != 'login-admin'){
            redirect(ADMIN . '/user/login-admin'); // UserController::loginAdminAction
        }
        new AppModel();
        App::$app->setProperty('cats', self::getCategory());
        App::$app->setProperty('brands', self::cacheBrands());
    }



    public static function getCategory(){
        $cats = R::getAssoc("SELECT * FROM category");
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

}