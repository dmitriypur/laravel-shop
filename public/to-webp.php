<?php
echo 999;
/*
function debug($arr){
    echo '<pre>' . print_r($arr, 1) . '</pre>';
}

$dir = __DIR__ . '/img/photos/';
$newdir = __DIR__ . '/img/resize/';
$files = scandir($dir);

foreach ($files as $file) {
    if (!in_array($file, array(".", "..", ".DS_Store"))) {
        $oldfile = $dir . $file;
        $newfile = $newdir . $file;
        
        $ext = explode('.', $file);
        $s = explode('_', $ext[0]);
        
        if($s[1] === '8' && (int)$s[0] > 1771){
            resize($oldfile, $oldfile, 1000, 1000, $ext[1]);
            echo $oldfile . '<br>';
        }
        // resize($newfile, $newfile, 1000, 700, $ext[1]);
        
    }

}


function resize($target, $dest, $wmax, $hmax, $ext){
    
    list($w_orig, $h_orig) = getimagesize($target);
    $ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

    if(($wmax / $hmax) > $ratio){
        $wmax = $hmax * $ratio;
    }else{
        $hmax = $wmax / $ratio;
    }
    $img = "";
    switch($ext){
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
    // switch($ext){
    //     case("png"):
    //         imagepng($newImg, $dest);
    //         imagewebp($newImg, str_replace(['png'], ['webp'], $dest));
    //         break;
    //     case("webp"):
    //         imagewebp($newImg, $dest);
    //         break;
    //     default:
    //         imagejpeg($newImg, $dest);
    //         imagewebp($newImg, str_replace(['jpg', 'jpeg', ], ['webp', 'webp'], $dest));
    // }
    // imagejpeg($newImg, $dest);
    imagewebp($newImg, str_replace(['jpg' ], ['webp'], $dest));
    imagedestroy($newImg);
}
*/