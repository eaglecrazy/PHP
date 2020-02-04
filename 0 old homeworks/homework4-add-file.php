<?php

if ($_FILES["upload_file"]['size'] > 3000000) {
    die("Размер файла более чем 3 Мегабайта");
} else {
    $number = count(scandir("img/small")) - 2;
    if ($number < 10) {
        $number = "0" . $number;
    }
    $path_small = "img/small/small$number.jpg";
    $path_big = "img/big/big$number.jpg";

    if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $path_big)) {
        imageresize($path_small, $path_big, 273, 153, 100);
    }
    die(json_encode($number));
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
