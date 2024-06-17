<?php

namespace app\models\admin;

use app\models\AppModel;

class Slide extends AppModel
{
    public array $attributes = [
        'image' => '',
        'mobile_image' => '',
        'title' => '',
        'text' => '',
        'link' => '',
        'button' => '',
        'is_active' => '',
    ];

    public array $rules = [
        'required' => [
            ['image'],
            ['link'],
        ],
    ];

    public function getImg(){
        if(!empty($_SESSION['slide'])){
            $this->attributes['image'] = $_SESSION['slide'];
            unset($_SESSION['slide']);
        }
        if(!empty($_SESSION['slide_mobile'])){
            $this->attributes['mobile_image'] = $_SESSION['slide_mobile'];
            unset($_SESSION['slide_mobile']);
        }
    }

    public function uploadImg($wmax, $hmax, $mobile = false){

        $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png", "image/svg+xml", "image/webp"); // массив допустимых расширений

        if(!$mobile){
            $uploaddir = WWW . '/img/slider/';

            $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['image']['name'])); // расширение картинки
            if($_FILES['image']['size'] > 1048576){
                $res = array("error1" => "Ошибка! Максимальный вес файла - 1 Мб!");
                exit(json_encode($res));
            }
            if($_FILES['image']['error']){
                $res = array("error2" => "Ошибка! Возможно, файл слишком большой.");
                exit(json_encode($res));
            }
            if(!in_array($_FILES['image']['type'], $types)){
                $res = array("error3" => "Допустимые расширения - .gif, .jpg, .png, .svg, .webp");
                exit(json_encode($res));
            }
            $i = rand(1,19);
            $new_name = md5(time().$i).".$ext";
            $uploadfile = $uploaddir.$new_name;
            if(@move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)){
                $_SESSION['slide'] = 'img/slider/'.$new_name;
                self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
                $res = array("image" => $new_name);
            }

        }else{
            $uploaddir = WWW . '/img/slider/mobile/';
            $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['mobile_image']['name'])); // расширение картинки
            if($_FILES['mobile_image']['size'] > 1048576){
                $res = array("error" => "Ошибка! Максимальный вес файла - 1 Мб!");
                exit(json_encode($res));
            }
            if($_FILES['mobile_image']['error']){
                $res = array("error" => "Ошибка! Возможно, файл слишком большой.");
                exit(json_encode($res));
            }
            if(!in_array($_FILES['mobile_image']['type'], $types)){
                $res = array("error" => "Допустимые расширения - .gif, .jpg, .png, .svg, .webp");
                exit(json_encode($res));
            }
            $i = rand(1,19);
            $new_name = md5(time().$i).".$ext";
            $uploadfile = $uploaddir.$new_name;

            if(@move_uploaded_file($_FILES['mobile_image']['tmp_name'], $uploadfile)){
                $_SESSION['slide_mobile'] = 'img/slider/mobile/'.$new_name;
                self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
                $res = array("mobile_image" => $new_name);
            }
        }
    }

    /**
     * @param string $target путь к оригинальному файлу
     * @param string $dest путь сохранения обработанного файла
     * @param string $wmax максимальная ширина
     * @param string $hmax максимальная высота
     * @param string $ext расширение файла
     */
    public static function resize($target, $dest, $wmax, $hmax, $ext){
        list($w_orig, $h_orig) = getimagesize($target);
        $ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

        if(($wmax / $hmax) > $ratio){
            $wmax = $hmax * $ratio;
        }else{
            $hmax = $wmax / $ratio;
        }

        $img = "";
        // imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
        switch($ext){
            case("gif"):
                $img = imagecreatefromgif($target);
                break;
            case("png"):
                $img = imagecreatefrompng($target);
                break;
            case("webp"):
                $img = imagecreatefromwebp($target);
                break;
            default:
                $img = imagecreatefromjpeg($target);
        }
        $newImg = imagecreatetruecolor((int)$wmax, (int)$hmax); // создаем оболочку для новой картинки

        if($ext == "png"){
            imagesavealpha($newImg, true); // сохранение альфа канала
            $transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
            imagefill($newImg, 0, 0, $transPng); // заливка
        }
        if($ext == "webp"){
            imagesavealpha($newImg, true); // сохранение альфа канала
            $transWebP = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
            imagefill($newImg, 0, 0, $transWebP); // заливка
        }

        imagecopyresampled($newImg, $img, 0, 0, 0, 0, (int)$wmax, (int)$hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
        switch($ext){
            case("gif"):
                imagegif($newImg, $dest);
                break;
            case("png"):
                imagepng($newImg, $dest);
                break;
            case("webp"):
                imagewebp($newImg, $dest);
                break;
            default:
                imagejpeg($newImg, $dest);
        }
        imagedestroy($newImg);
    }
}