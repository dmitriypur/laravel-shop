<?php

namespace app\widgets\settings;

use ishop\Cache;
use RedBeanPHP\R;

class Settings
{
    protected string $cacheKey = 'settings';
//    protected int $cache = 3600 * 60 * 24 * 30;
    protected int $cache = 3;


    public function run()
    {
        $cache = Cache::instance();
        $settings = $cache->get($this->cacheKey);
        if(!$settings){
            $settings = R::getRow('SELECT * FROM settings WHERE id = ?', [1]);
            $cache->set($this->cacheKey, $settings, $this->cache);
        }
        return $settings;
    }
}