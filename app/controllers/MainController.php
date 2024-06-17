<?php

namespace app\controllers;

use ishop\App;
use RedBeanPHP\R;

class MainController extends AppController
{
    public function indexAction(){
        $slides = R::getAssoc("SELECT * FROM slider");
        $brands = R::find('brand', 'LIMIT 3');
        $hits = R::find('product', "hit = '1' AND status = '1' LIMIT 8");
        $sale = R::find('product', "old_price > 0 AND status = '1' LIMIT 8");
        $cats = App::$app->getProperty('cats');
        $this->setMeta("Главная страница | {$this->shop_name}", 'Интернет-магазин по продаже кроссовок известных брендов, таких как Adidas, Nike, New Balance, Louis Vuitton, Converse, Balenciaga и многие другие, предлагает широкий ассортимент качественной обуви для всех возрастов и стилей.', '');
        $this->set(compact('brands', 'hits', 'sale', 'cats', 'slides'));
    }

    public function sitemapAction()
    {
        $out = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $out .= '
            <url>
                <loc>'.PATH.'/category</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <priority>0.7</priority>
            </url>
        ';
        $categories = App::$app->getProperty('cats');
        $products = R::getCol('SELECT alias FROM product');
        foreach ($categories as $item){
            $out .= '
                <url>
                    <loc>'.PATH.'/category/'.$item['alias'].'</loc>
                    <lastmod>' . date('Y-m-d') . '</lastmod>
                    <priority>0.5</priority>
                </url>';
        }
        foreach ($products as $item){
            $out .= '
                <url>
                    <loc>'.PATH.'/product/'.$item.'</loc>
                    <lastmod>' . date('Y-m-d') . '</lastmod>
                    <priority>1.0</priority>
                </url>';
        }
        $out .= '
            <url>
                <loc>'.PATH.'/contacts</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <priority>0.5</priority>
            </url>
            <url>
                <loc>'.PATH.'/sale</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <priority>0.5</priority>
            </url>
            <url>
                <loc>'.PATH.'/page/oplata-i-dostavka</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <priority>0.5</priority>
            </url>
        ';
        $out .= '</urlset>';

        header('Content-Type: text/xml; charset=utf-8');
        echo $out;
        exit();
    }

    public function closedAction(){
        $this->setMeta('Сайт в стадии разработки');
    }
}