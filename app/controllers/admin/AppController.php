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
    }



    public static function getCategory(){
        $cats = R::getAssoc("SELECT * FROM category");
        return $cats;
    }

}