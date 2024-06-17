<?php

namespace app\controllers\admin;

use ishop\Cache;

class CacheController extends AppController
{

    public function indexAction()
    {
        $this->setMeta('Очистка кэша');
    }

    public function deleteAction()
    {
        $key = $_GET['key'] ?? null;
        $cache = Cache::instance();

        switch ($key){
            case 'category':
                $cache->delete('cats');
                $cache->delete('mobile-menu');
                $cache->delete('ishop_menu');
                $cache->delete('admin_cat');
                $cache->delete('sidebar-menu');
                break;
            case 'filter':
                $cache->delete('filter_group');
                $cache->delete('filter_attrs');
                break;
            case 'all':
                $cache->delete('cats');
                $cache->delete('mobile-menu');
                $cache->delete('ishop_menu');
                $cache->delete('admin_cat');
                $cache->delete('sidebar-menu');
                $cache->delete('filter_group');
                $cache->delete('filter_attrs');
                break;
        }
        $_SESSION['success'] = "Выбранный кэш удален";
        redirect();
    }

}