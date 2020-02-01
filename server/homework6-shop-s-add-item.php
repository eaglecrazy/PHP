<?php
require_once('homework6-shop-s-config.php');

if(isset($_POST)){
    if ($_FILES["upload_file"]['size'] > 10000000) {
        die("Размер файла более чем 10 Мегабайт.");
    }
//ограничить типы файлов
    //получим данные из запроса
    $name = trim($_POST['name']);
    $id = getUrlName($name);
    $cost = $_POST['cost'];
    $description = $_POST['description'];

    //проверим нет ли в базе файла с id == $id;
    if($query = mysqli_query($link, "SELECT id FROM items WHERE id='$id'")) {
        die("Товар с таким наименованием уже есть в базе данных.");
    }

    //сгенерируем пути
    $extension = getExtension($_FILES["photo"]["name"]);
    $path_small = SMALL . $id . $extension;
    $path_big = BIG . $id . $extension;

    //переместим файл и создадим уменьшенную копию не более 250*156 пикселей
    //а обычную уменьшим до 750*468
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $path_big)) {
        imageresize($path_big, $path_big, 750, 468, 100);
        imageresize($path_small, $path_big, 250, 156, 100);
    }
    //добавим в БД
    $query = mysqli_query($link, "INSERT INTO items (id, name, cost, description) VALUES ('$id', '$name', '$cost', '$description')");

    //вернёмся обратно в админку
    header('Location: ../homework6-shop-admin-page.php');
}

//получение расширения файла;
function getExtension($fileName) {
    return substr($fileName, strrpos($fileName, '.'));
}

//перевод названия в транслит без пробелов
function getUrlName($str){
    $transliteration = [
        'ё' => 'yo',
        'й' => 'y',
        'ц' => 'ts',
        'у' => 'u',
        'к' => 'k',
        'е' => 'e',
        'н' => 'n',
        'г' => 'g',
        'ш' => 'sh',
        'щ' => 'sch',
        'з' => 'z',
        'х' => 'kh',
        'ф' => 'f',
        'ы' => 'y',
        'в' => 'v',
        'а' => 'a',
        'п' => 'p',
        'р' => 'r',
        'о' => 'o',
        'л' => 'l',
        'д' => 'd',
        'ж' => 'zh',
        'э' => 'e',
        'я' => 'ya',
        'ч' => 'ch',
        'с' => 's',
        'м' => 'm',
        'и' => 'i',
        'т' => 't',
        'б' => 'b',
        'ю' => 'yu'
    ];
    $s = str_replace(' ', '_', $str);
    $s = strtr(mb_strtolower($s), $transliteration);
    //удалим недопустимые символы
    return preg_replace("/[^a-z0-9\_\-\.]/i", '', $s);
}


//изменение размеров изображения
function imageResize($outfile, $infile, $neww, $newh, $quality)
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