<?php

namespace app\controllers\admin;

use app\models\admin\Product;
use app\models\admin\Slide;
use app\models\AppModel;
use RedBeanPHP\R;

class SlideController extends AppController
{
    public function indexAction()
    {
        $slides = R::getAll("SELECT * FROM slider");
        $this->setMeta('Список страниц');
        $this->set(compact('slides'));
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            $slide = new Slide();
            $slide->uploadImg(1920, 1200);
            $slide->uploadImg(575, 420, true);
            $data = $_POST;
            $data['image'] = $_SESSION['slide'];
            $data['mobile_image'] = $_SESSION['slide_mobile'];
            $slide->load($data);
            $slide->attributes['is_active'] = $slide->attributes['is_active'] ? '1' : '0';
            $slide->getImg();

            if (!$slide->validate($data)) {
                $slide->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if ($id = $slide->save('slider')) {
                $_SESSION['success'] = "Слайд добавлен";
                redirect();
            }
        }
    }
    public function editAction()
    {
        if (!empty($_POST)) {
            $image = $_POST['img'];
            unset($_POST['img']);
            $image_m = $_POST['img_m'];
            unset($_POST['img_m']);
            $id = $this->getRequestId(false);
            $slide = new Slide();
            $data = $_POST;
            if($_FILES['image']['name']){
                $slide->uploadImg(1920, 1200);
                $data['image'] = $_SESSION['slide'];
            }else{
                $data['image'] = $image;
            }

            if($_FILES['mobile_image']['name']){
                $slide->uploadImg(575, 420, true);
                $data['mobile_image'] = $_SESSION['slide_mobile'];
            }else{
                $data['mobile_image'] = $image_m;
            }
            $slide->load($data);
            $slide->attributes['is_active'] = $slide->attributes['is_active'] ? '1' : '0';
            $slide->getImg();

            if (!$slide->validate($data)) {
                $slide->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
            if ($slide->update('slider', $id)) {
                $_SESSION['success'] = "Изменения сохранены";
                redirect();
            }
        }
        $id = $this->getRequestId();
        $slide = R::load('slider', $id);
        $this->setMeta("Редактирование слайда {$slide->title}");
        $this->set(compact('slide'));
    }

    public function deleteAction()
    {
        $id = $this->getRequestId();
        if ($id) {
            $slide = R::load('slider', $id);
            @unlink(WWW . '/' . $slide->image);
            R::trash($slide);
            $_SESSION['success'] = "Слайд удален";
            redirect();
        }
    }
}