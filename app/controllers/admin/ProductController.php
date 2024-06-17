<?php

namespace app\controllers\admin;

use app\models\admin\Product;
use app\models\AppModel;
use ishop\App;
use ishop\libs\Pagination;
use RedBeanPHP\R;

class ProductController extends AppController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 30;
        $count = R::count('product');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $products = R::getAll("SELECT p.id, p.title, p.price, p.old_price, p.img, p.status, p.hit FROM product p
        WHERE p.status = 1
        ORDER BY p.id DESC LIMIT $start, $perpage");

        $this->setMeta('Список товаров');
        $this->set(compact('products', 'pagination', 'count'));
    }

    public function addImageAction()
    {
        if (isset($_POST)) {
            if ($_POST['name'] == 'single') {
                $wmax = App::$app->getProperty('img_width');
                $hmax = App::$app->getProperty('img_height');
            } else {
                $wmax = App::$app->getProperty('gallery_width');
                $hmax = App::$app->getProperty('gallery_height');
            }

            $name = $_POST['name'];
            $product = new Product();
            $product->uploadImg($name, $wmax, $hmax);
        }
        die;
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['status'] = $product->attributes['status'] ? '1' : '0';
            $product->attributes['hit'] = $product->attributes['hit'] ? '1' : '0';
            $product->attributes['old_price'] = $product->attributes['old_price'] ? $product->attributes['old_price'] : 0;
            $product->getImg();

            if (!$product->validate($data)) {
                $product->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if(!$product->attributes['img']){
                $product->attributes['img'] = 'img/noimage.jpg';
            }
            
            if ($id = $product->save('product')) {
                $product->saveGallery($id);
                $alias = AppModel::createAlias('product', 'alias', $data['title'], $id);
                $p = R::load('product', $id);
                $p->alias = $alias;
                R::store($p);
                $product->editCategory($id, $data);
                $product->editFilter($id, $data);
                $product->editRelatedProduct($id, $data);
            }

            $_SESSION['success'] = "Товар добавлен";
            redirect();
        }
        $this->setMeta('Добавить товар');
    }

    public function editAction()
    {
        if (!empty($_POST)) {
            $id = $this->getRequestId(false);
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['status'] = $product->attributes['status'] ? '1' : '0';
            $product->attributes['hit'] = $product->attributes['hit'] ? '1' : '0';
            $product->attributes['old_price'] = $product->attributes['old_price'] ?: 0;

            $product->getImg();
            if (!$product->validate($data)) {
                $product->getErrors();
                redirect();
            }
            if ($product->update('product', $id)) {

                $product->editFilter($id, $data);
                $product->editRelatedProduct($id, $data);
                $product->editCategory($id, $data);
                $product->saveGallery($id);

                $product = R::load('product', $id);
                R::store($product);
                $_SESSION['success'] = "Изменения сохранены";
                redirect();
            }
        }
        $id = $this->getRequestId();
        $product = R::load('product', $id);
        $cats = R::getCol("SELECT category_id FROM category_product WHERE product_id = ?", [$id]);
        App::$app->setProperty('parent_id', $cats);
        $filter = R::getCol("SELECT attr_id FROM attribute_product WHERE product_id = ?", [$id]);
        $related_product = R::getAll("SELECT rp.related_id, p.title FROM related_product rp JOIN product p on p.id = rp.related_id WHERE rp.product_id = ?", [$id]);
        $gallery = R::getAll("SELECT id, img FROM gallery WHERE product_id = ?", [$id]);
        $this->setMeta("Редактирование товара {$product->title}");
        $this->set(compact('product', 'related_product', 'filter', 'gallery'));
    }

    public function editListAction()
    {
        if(!empty($_POST)){
//            debug($_POST, 1);
            $id = $_POST['id'];
            $product = R::load('product', $id);
            $product->status = $_POST['status'] ?? $product->status;
            $product->hit = $_POST['hit'] ?? $product->hit;

            $res = R::store($product);
            exit(json_encode($res));
        }
    }

    public function relatedProductAction()
    {
        $q = $_GET['q'] ?? '';
        $data['items'] = [];
        $products = R::getAssoc("SELECT id, title FROM product WHERE title LIKE ? LIMIT 10", ["%{$q}%"]);
        if ($products) {
            $i = 0;
            foreach ($products as $id => $title) {
                $data['items'][$i]['id'] = $id;
                $data['items'][$i]['text'] = $title;
                $i++;
            }
        }
        echo json_encode($data);
        die;
    }

    public function deleteGalleryAction()
    {
        $id = $_POST['id'] ?? null;
        $src = $_POST['src'] ?? null;
        if (!$id || !$src) {
            return;
        }
        $webp = explode('.', $src);
        $webp = $webp[0] . '.webp';

        if (R::exec("DELETE FROM gallery WHERE product_id = ? AND img = ?", [$id, $src])) {
            @unlink(WWW . '/' . $src);
            @unlink(WWW . '/' . $webp);
            exit('1');
        }
        return;
    }

    public function deleteImageAction()
    {
        $id = $_POST['id'] ?? null;
        $src = $_POST['src'] ?? null;
        if (!$id || !$src) {
            return;
        }
        $webp = explode('.', $src);
        $webp = $webp[0] . '.webp';
        if (R::exec("UPDATE product SET img = '' WHERE product.id = ?", [$id])) {
            @unlink(WWW . '/' . $src);
            @unlink(WWW . '/' . $webp);
            exit('1');
        }
        return;
    }

    public function deleteAction()
    {
        $id = $this->getRequestId();
        $gallery = R::getAll("SELECT id, img FROM gallery WHERE product_id = ?", [$id]);
        if ($id) {
            R::exec("DELETE FROM related_product WHERE product_id = ?", [$id]);
            R::exec("DELETE FROM attribute_product WHERE product_id = ?", [$id]);
            if (R::exec("DELETE FROM gallery WHERE product_id = ?", [$id])) {
                foreach ($gallery as $item) {
                    $webpg = explode('.', $item['img']);
                    $webpg = $webpg[0] . '.webp';
                    @unlink(WWW . '/' . $item['img']);
                    @unlink(WWW . '/' . $webpg);
                }
            }
            $product = R::load('product', $id);
            $webp = explode('.', $product->img);
            $webp = $webpg[0] . '.webp';
            @unlink(WWW . '/' . $product->img);
            @unlink(WWW . '/' . $webp);
            R::trash($product);
            $_SESSION['success'] = "Товар удален";
            redirect();
        }
    }
}