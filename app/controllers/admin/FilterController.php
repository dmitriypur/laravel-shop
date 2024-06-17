<?php

namespace app\controllers\admin;

use app\models\admin\FilterAttr;
use app\models\admin\FilterGroup;
use ishop\libs\Pagination;
use RedBeanPHP\R;

class FilterController extends AppController
{
    public function attributeGroupAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 20;
        $count = R::count('attribute_group');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $attrs_group = R::findAll('attribute_group', "LIMIT $start, $perpage");
        $this->setMeta('Группы фильтров');
        $this->set(compact('attrs_group', 'pagination', 'count'));
    }
    public function groupDeleteAction()
    {
        $id = $this->getRequestId();
        $count = R::count('attribute_value', 'attr_group_id = ?', [$id]);
        if($count){
            $_SESSION['error'] = 'Удаление не возможно, в группе есть атрибуты.';
            redirect();
        }
        R::exec("DELETE FROM attribute_group WHERE id = ?", [$id]);
        $_SESSION['success'] = 'Группа фильтров удалена';
        redirect();
    }

    public function groupEditAction()
    {
        if(!empty($_POST)){
            $id = $this->getRequestId(false);
            $group = new FilterGroup();
            $data = $_POST;
            $group->load($data);
            $group->attributes['active'] = $group->attributes['active'] ? '1' : '0';
            if(!$group->validate($data)){
                $group->getErrors();
                redirect();
            }
            if($group->update('attribute_group', $id)){
                $_SESSION['success'] = 'Группа сохранена';
                redirect();
            }
        }
        $id = $this->getRequestId();
        $group = R::load('attribute_group', $id);
        $this->setMeta("Редактирование группы {$group->title}");
        $this->set(compact('group'));
    }

    public function groupAddAction()
    {

        if(!empty($_POST)){
            $group = new FilterGroup();
            $data = $_POST;
            $group->load($data);
            $group->attributes['active'] = $group->attributes['active'] ? '1' : '0';
            if(!$group->validate($data)){
                $group->getErrors();
                redirect();
            }
            if($group->save('attribute_group', false)){
                $_SESSION['success'] = 'Группа добавлена';
                redirect();
            }
        }
        $this->setMeta('Новая группа фильтров');
    }

    public function attributeAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 20;
        $count = R::count('attribute_value');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $attrs = R::getAssoc("SELECT av.*, ag.title FROM attribute_value av JOIN attribute_group ag ON ag.id = av.attr_group_id LIMIT $start, $perpage");
        $this->setMeta('Фильтры');
        $this->set(compact('attrs', 'pagination', 'count'));
    }

    public function attrAddAction()
    {
        if(!empty($_POST)){
            $attr = new FilterAttr();
            $data = $_POST;
            $attr->load($data);
            if(!$attr->validate($data)){
                $attr->getErrors();
                redirect();
            }
            if($attr->save('attribute_value', false)){
                $_SESSION['success'] = 'Атрибут добавлен';
                redirect();
            }

        }
        $attrs_group = R::findAll('attribute_group');
        $this->setMeta('Новый фильтр');
        $this->set(compact('attrs_group'));
    }

    public function attrEditAction()
    {
        if(!empty($_POST)){
            $id = $this->getRequestId(false);
            $attr = new FilterAttr();
            $data = $_POST;
            $attr->load($data);
            if(!$attr->validate($data)){
                $attr->getErrors();
                redirect();
            }
            if($attr->update('attribute_value', $id)){
                $_SESSION['success'] = 'Атрибут сохранен';
                redirect();
            }
        }
        $id = $this->getRequestId();
        $attr = R::load('attribute_value', $id);
        $attrs_group = R::findAll('attribute_group');
        $this->setMeta("Редактирование атрибута {$attr->value}");
        $this->set(compact('attr', 'attrs_group'));
    }

    public function attrDeleteAction()
    {
        $id = $this->getRequestId();
        R::exec("DELETE FROM attribute_value WHERE id = ?", [$id]);
        $_SESSION['success'] = 'Фильтр удален';
        redirect();
    }
}