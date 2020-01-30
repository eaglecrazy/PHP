<?php

if ($_FILES["upload_file"]['size'] > 3000000) {
    die("Размер файла более чем 3 Мегабайта");
}
require_once("homework5-config.php");
$number = addToDb($link, $_FILES["upload_file"]['size']);
$path_small = "img/small/small$number.jpg";
$path_big = "img/big/big$number.jpg";

if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $path_big)) {
    imageresize($path_small, $path_big, 273, 153, 100);
}
die(json_encode($number));
//echo $number;


function addToDb($link, $size)
{

    $query = mysqli_query($link, "SELECT COUNT(*) FROM `images`");
    $count = mysqli_fetch_row($query)[0];

//    if(!$count) {//нет записей
        //ТУТ БАГ С ПЕРВОЙ ЗАПИСЬЮ .РАЗБИРАЮСЬ.
//        $query = mysqli_query($link, "INSERT INTO `images` (`id`) VALUES (NULL)");
//        $data = mysqli_fetch_assoc($query);
//        $number = $data["MAX(`id`)"];
//        $path = "img/small/small$number.jpg";
//            $path = 'qqqqqqqqqqq';

//        $query = mysqli_query($link, "UPDATE `images` SET `path` = '$path', `size` = '$size' WHERE `images`.`id` = '$number'");
//        $query = mysqli_query($link, "UPDATE `images` SET `path` = '123', `size` = '$size', `data_create` = current_timestamp(), `views` = '0' WHERE `images`.`id` = '$number'");


//    } else {//есть записи
        $data = mysqli_fetch_assoc($query);
        $number = $data["MAX(`id`)"] + 1;
        $path = "img/small/small$number.jpg";
        $query = mysqli_query($link, "INSERT INTO `images` (`id`, `path`, `size`, `data_create`, `views`) VALUES (NULL, '$path', '$size', current_timestamp(), '0')");
//    }

    $query = mysqli_query($link, "SELECT MAX(`id`) FROM `images`");
    return $number;
}

function imageresize($outfile, $infile, $neww, $newh, $quality)
{
    $im = imagecreatefromjpeg($infile);
    $k1 = $neww / imagesx($im);
    $k2 = $newh / imagesy($im);
    $k = $k1 > $k2 ? $k2 : $k1;

    $w = intval(imagesx($im) * $k);
    $h = intval(imagesy($im) * $k);

    $im1 = imagecreatetruecolor($w, $h);
    imagecopyresampled($im1, $im, 0, 0, 0, 0, $w, $h, imagesx($im), imagesy($im));

    imagejpeg($im1, $outfile, $quality);
    imagedestroy($im);
    imagedestroy($im1);
}
