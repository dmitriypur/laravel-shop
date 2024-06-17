<?php

namespace app\controllers\admin;

use app\models\admin\Page;
use app\models\AppModel;
use ishop\App;
use ishop\libs\Pagination;
use RedBeanPHP\R;

class PageController extends AppController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 30;
        $count = R::count('page');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $pages = R::getAll("SELECT p.id, p.title FROM page p
        ORDER BY p.id DESC LIMIT $start, $perpage");

//        debug($pages,1);

        $this->setMeta('Список страниц');
        $this->set(compact('pages', 'pagination', 'count'));
    }


    public function addAction()
    {
        if (!empty($_POST)) {
            $page = new Page();
            $data = $_POST;
            $page->load($data);

            if (!$page->validate($data)) {
                $page->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if ($id = $page->save('page')) {
                $alias = AppModel::createAlias('page', 'alias', $data['title'], $id);
                $p = R::load('page', $id);
                $p->alias = $alias;
                R::store($p);
            }

            $_SESSION['success'] = "Страница добавлена";
            redirect();
        }
        $this->setMeta('Добавить страницу');
    }

    public function editAction()
    {
        if (!empty($_POST)) {
            $id = $this->getRequestId(false);
            $page = new Page();
            $data = $_POST;
            $page->load($data);

            if (!$page->validate($data)) {
                $page->getErrors();
                redirect();
            }

            if ($page->update('page', $id)) {
                $page = R::load('page', $id);
                R::store($page);
                $_SESSION['success'] = "Изменения сохранены";
                redirect();
            }
        }
        $id = $this->getRequestId();
        $page = R::load('page', $id);
        $this->setMeta("Редактирование товара {$page->title}");
        $this->set(compact('page'));
    }

    public function deleteAction()
    {
        $id = $this->getRequestId();
        if ($id) {
            $page = R::load('page', $id);
            R::trash($page);
            $_SESSION['success'] = "Страница удалена";
            redirect();
        }
    }
}