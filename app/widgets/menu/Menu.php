<?php

namespace app\widgets\menu;

use ishop\App;
use ishop\Cache;
use RedBeanPHP\R;

class Menu
{

    protected array $data;
    protected array $tree;
    protected string $menuHtml;
    protected string $tpl;
    protected string $container = 'ul';
    protected string $table = 'category';
    protected int $cache = 3600;
    protected string $cacheKey = 'ishop_menu';
    protected array $attrs = [];
    protected string $class = 'main-menu nav';
    protected string $prepend = '';
    protected string $append = '';

    public function __construct($options)
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options): void
    {
        foreach ($options as $k => $v){
            if(property_exists($this, $k)){
                $this->$k = $v;
            }
        }
    }

    protected function run(): void
    {
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if(!$this->menuHtml){
            $this->data = App::$app->getProperty('cats');
            if(!$this->data){
                $this->data = R::getAssoc("SELECT * FROM {$this->table}");
            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            if($this->cache){
                $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
            }
        }
        $this->output();
    }

    protected function output(): void
    {
        $attrs = '';
        if(!empty($this->attrs)){
            foreach($this->attrs as $k => $v){
                $attrs .= " $k='$v' ";
            }
        }
        echo "<{$this->container} class='{$this->class}' $attrs>";
        if($this->prepend){
            echo $this->prepend;
        }
        echo $this->menuHtml;
        if($this->append){
            echo $this->append;
        }
        echo "</{$this->container}>";
    }

    protected function getTree(): array
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node){
            if(!$node['parent_id']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = ''): string
    {
        $str = '';
        $i = 0;
        foreach($tree as $id => $category){
            $i++;
            $str .= $this->catToTemplate($category, $tab, $id, $i);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab, $id, $i): bool|string
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

}