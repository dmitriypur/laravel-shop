<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Category;
use app\widgets\filter\Filter;
use ishop\App;
use ishop\libs\Pagination;
use RedBeanPHP\R;
use SebastianBergmann\Diff\Exception;

class CategoryController extends AppController
{

    private static function getProps(){
        $sql_part = '';

        if(!empty($_GET['filter'])){
            $params = explode(';', $_GET['filter']);
            $props = '';
            $size = '';

            foreach($params as $item){
                $f = explode(':', $item);

                if($f[0] == 'size'){
                    $size .= $f[1] . ',';
                }else{
                    $props .= $f[1] . ',';
                }
            }

            $props = trim($props, ',');
            $size = trim($size, ',');

            if($props){
                $cnt = Filter::getCountGroups($props);
                $sql_part .= " AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($props) GROUP BY product_id HAVING COUNT(product_id) = $cnt )";
            }

            if($size){
                $sql_part .= " AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($size))";
            }
        }
        if(!empty($_GET['price'])){
            $price = explode(',', $_GET['price']);
            $sql_part .= " AND price BETWEEN $price[0] AND $price[1]";
        }
        return $sql_part;
    }

    public function viewAction(){
        $alias = $this->route['alias'];
        $category = R::findOne('category', "alias = ?", [$alias]);
        if(!$category){
            throw new \Exception('Страница не найдена', 404);
        }
        $cat = $category->title;
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);
        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id) ? $cat_model->getIds($category->id) . $category->id : $category->id;

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $sql_part = self::getProps();

        $productIds = R::getCol("SELECT DISTINCT product_id FROM category_product WHERE category_id IN ($ids)");
        $productIds = implode(',', $productIds);

        $total = R::count('product', "status = '1' AND id IN ($productIds) $sql_part");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = R::findAll('product', "status = '1' AND id IN ($productIds) $sql_part LIMIT $start, $perpage");

        if($this->isAjax()){
            $this->loadView('filter', compact('products', 'pagination', 'total', 'perpage'));
        }
        $cat_title = $category->keywords ? $category->keywords : "Кроссовки категории $category->title | Интернет магазин фирменной обуви Твои кроссовки";
        $cat_desc = $category->description ? $category->description : "Купите высококачественные кроссовки известных брендов от 1999 руб в нашем интернет-магазине Твои кроссовки. Широкий ассортимент в категории {$category->title} включает стильную и функциональную обувь от ведущих производителей.";

        $this->setMeta($cat_title, $cat_desc, '');
        $this->set(compact('products', 'breadcrumbs', 'pagination', 'total', 'cat', 'perpage'));
    }

    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $sql_part = self::getProps();

        $total = R::count('product', "status = '1' $sql_part");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = R::findAll('product', "status = '1' $sql_part LIMIT $start, $perpage");

        if($this->isAjax()){
            $this->loadView('filter', compact('products', 'pagination', 'total', 'perpage'));
        }

        $this->setMeta('Каталог товаров | Интернет магазин Твои кроссовки', 'Купить кроссовки известных мировых брендов, отличного качества от 2000 р в интернет магазине "Твои кроссовки"');
        $this->set(compact('products', 'pagination', 'total', 'perpage'));
    }

    public function unloadingAction()
    {
        $products = R::getAll("SELECT p.id, p.alias, p.title, p.price, p.img, b.title as brand, GROUP_CONCAT(DISTINCT pc.category_id) as cat, GROUP_CONCAT(g.img) as images
            FROM product p
            JOIN gallery g ON g.product_id = p.id
            JOIN brand b ON b.id = p.brand_id
            JOIN category_product pc ON pc.product_id = p.id
            GROUP BY p.id");


        $new_prods = [];
        if (!file_exists(ROOT . '/products')) {
            mkdir(ROOT . '/products', 0777, true);
        }
        foreach($products as $key => $item){
            $images = explode(',', $item['images']);
            array_unshift($images, $item['img']);
            $item['images'] = $images;
            if($item['cat'] == 19){
                $item['size'] = '36-45';
            }elseif($item['cat'] == 14){
                $item['size'] = '41-45';
            }else{
                $item['size'] = '36-41';
            }
            $item['url'] = "https://your-sneakers.ru/product/{$item['alias']}";
            unset($item['img']);
            unset($item['cat']);
            unset($item['alias']);

            $new_prods[] = $item;
            if (file_exists(ROOT . '/products')) {
                if (!file_exists(ROOT . '/products/' . str_replace(' ', '_', $item['title'] . '-'. $key) . '/img/photos')) {
                    mkdir(ROOT . '/products/' . str_replace(' ', '_', $item['title'] . '-'. $key) . '/img/photos', 0777, 1);
                }else{
                    foreach($images as $img){
                        $dir = WWW .'/'. $img;
                        $new_dir = ROOT . '/products/' . str_replace(' ', '_', $item['title'] . '-'. $key) . '/' . $img;
                        echo $dir . '<br>';
                        echo $new_dir . '<br>';
                        echo '==================<br>';
                        if(!copy($dir, $new_dir)){
                            echo "Не удалось скопировать" . WWW .'/'. $img . '<br>';
                        }
                    }
                }
            }
        }
        $arr = json_encode($new_prods);
        $json = file_put_contents(ROOT . "/data.json", $arr);
        exit;

    }

}