<?php

namespace app\widgets\filter;

use ishop\Cache;
use RedBeanPHP\R;

class Filter
{

    public $groups;
    public $attrs;
    public $tpl;
    public $filter;

    public function __construct($filter = null, $tpl = ''){
        $this->filter = $filter;
        $this->tpl = $tpl ?: __DIR__ . '/filter_tpl.php';
        $this->run();
    }

    protected function run(){
        $cache = Cache::instance();
        $this->groups = $cache->get('filter_group');
        if(!$this->groups){
            $this->groups = $this->getGroups();
            $cache->set('filter_group', $this->groups, 1);
        }
        $this->attrs = $cache->get('filter_attrs');
        if(!$this->attrs){
            $this->attrs = self::getAttrs();
            $cache->set('filter_attrs', $this->attrs, 1);
        }

        $filters = $this->getHtml();
        echo $filters;
    }

    protected function getHtml(){
        ob_start();
        $filter = self::getFilter();
        if(!empty($filter)){
            $filter = explode(',', $filter);
        }
        require $this->tpl;
        return ob_get_clean();
    }

    protected function getGroups(){
        return R::getAssoc("SELECT id, title, alias, type_inp, `active` FROM attribute_group");
    }
    protected static function getAttrs(){
        $data = R::getAssoc("SELECT * FROM attribute_value ORDER BY value");
        $attrs = [];
        foreach ($data as $k => $v){
            $attrs[$v['attr_group_id']][$k] = $v['value'];
        }
        return $attrs;
    }

    public static function getFilter(){
        $params = explode(';', $_GET['filter']);
        $filter = '';

        foreach($params as $item){
            $f = explode(':', $item);

            $filter .= $f[1] . ',';
        }
        return trim($filter, ',');
    }

    public static function getCountGroups($filter){
        $filters = explode(',', $filter);
        $cache = Cache::instance();
//        $attrs = $cache->get('filter_attrs');
//        if(!$attrs){
            $attrs = self::getAttrs();
//        }
        $arr = [];
        foreach($attrs as $key => $value){
            foreach($value as $k => $v){
                if(in_array($k, $filters)){
                    $arr[] = $key;
                    break;
                }
            }
        }
        return count($arr);
    }

}