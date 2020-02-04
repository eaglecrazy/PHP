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

function addToDb($link, $size)
{
    //узнаём количество записей в базе
    $query = mysqli_query($link, "SELECT COUNT(*) FROM `images`");
    $count = mysqli_fetch_row($query)[0];

    if(!$count){//записей нет
        //сделаем новую запись, чтобы узнать id присвоенный БД
        $query = mysqli_query($link, "INSERT INTO `images` (`id`) VALUES (NULL)");
        //получим присвоенный id
        $query = mysqli_query($link, "SELECT MAX(`id`) FROM `images`");
        $data = mysqli_fetch_assoc($query);
        $id = $data["MAX(`id`)"];
        //изменим запись
        $path = "img/small/small$id.jpg";
        $query = mysqli_query($link, "UPDATE `images` SET `path` = '$path', `size` = '$size', `data_create` = current_timestamp() WHERE `id` = '$id'");
        return $id;
    }
    //записи есть
    $query = mysqli_query($link, "SELECT MAX(`id`) FROM `images`");
    $data = mysqli_fetch_assoc($query);
    $id = $data["MAX(`id`)"] + 1;
    $path = "img/small/small$id.jpg";
    $query = mysqli_query($link, "INSERT INTO `images` (`id`, `path`, `size`, `data_create`) VALUES (NULL, '$path', '$size', current_timestamp())");
    return $id;
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
