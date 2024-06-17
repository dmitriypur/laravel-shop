<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Product;
use ishop\App;
use RedBeanPHP\R;

class ProductController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $product = R::findOne('product', "alias = ? AND status = '1'", [$alias]);

        if(!$product){
            throw new \Exception('Страница не найдена', 404);
        }
        $gallery = R::findAll('gallery', "product_id = ?", [$product->id]);
        $related = R::getAll("SELECT * FROM related_product rp JOIN product p on p.id = rp.related_id WHERE rp.product_id = ?", [$product->id]);
        $brand = R::findOne('brand', "id = ?", [$product->brand_id]);
        $p_model = new Product();
        $p_model->setRecentlyViewed($product->id);
        $r_viewed = $p_model->gerRecentlyViewed();
        $recentlyViewed = null;
        if($r_viewed){
            $recentlyViewed = R::find('product', 'id IN (' . R::genSlots($r_viewed) . ') LIMIT 4', $r_viewed);
        }

        $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);

        $attrIds = R::getCol("SELECT attr_id FROM attribute_product WHERE product_id = ?", [$product->id]);
        $attrIds = implode(',', $attrIds);

        if($attrIds){
            $attrs = R::getAll("SELECT av.id, av.value FROM attribute_value av JOIN attribute_group ag on ag.id = av.attr_group_id  WHERE av.id IN ($attrIds) AND ag.type_inp = 2 ORDER BY av.value");
            $attrs2 = R::getAll("SELECT av.id, av.value FROM attribute_value av JOIN attribute_group ag on ag.id = av.attr_group_id  WHERE av.id IN ($attrIds) AND ag.type_inp = 1 ORDER BY av.value");
            $brend = isset($attrs2[0]) ? " фирмы {$attrs2[0]['value']}," : '';
            $color = isset($attrs2[1]) ? " цвет {$attrs2[1]['value']}" : '';
            $title = "Кроссовки {$product->title} фирмы {$brand->title}";
            $description = "Купить кроссовки {$product->title} фирмы {$brand->title} по цене от {$product->price}р в интернет магазине брендовой обуви {$this->shop_name}";
        }else{
            $attrs = null;
            $title = "Кроссовки {$product->title} фирмы {$brand->title}";
            $description = "Купить кроссовки {$product->title} по цене от {$product->price}р в интернет магазине брендовой обуви {$this->shop_name}";
        }

        $this->setMeta($title, $description, $product->keywords);
        $this->set(compact('product', 'related', 'gallery', 'recentlyViewed', 'breadcrumbs', 'attrs', 'attrs2', 'brand'));
    }
}