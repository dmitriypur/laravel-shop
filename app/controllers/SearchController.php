<?php

namespace app\controllers;

use RedBeanPHP\R;
use ishop\App;
use ishop\libs\Pagination;

class SearchController extends AppController
{

    public function liveAction(){
        if($this->isAjax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if($query){
                $products = R::getAll("SELECT id, title, alias FROM product WHERE title LIKE ? AND status = '1' LIMIT 10", ["%{$query}%"]);
                $this->loadView('search_modal', compact('products'));
            }
        }
        die;
    }

    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');

        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;

        $total = R::count('product', "title LIKE ? AND status = '1'", ["%$query%"]);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        if($query){
            $products = R::find("product", "WHERE title LIKE ? AND status = '1' LIMIT $start, $perpage", ["%$query%"]);
            $this->setMeta("Результаты поиска по запросу " . h($query), '', '');
            $this->set(compact('products', 'query', 'pagination', 'total', 'perpage'));
        }
    }

}