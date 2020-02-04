<?php
require_once('homework6-shop-db-config.php');
require_once('homework6-shop-functions.php');

if (isset($_GET)) {
    //имя
    if (isset($_GET['name'])) {
        $old_id = $_GET['id'];
        $new_name = $_GET['name'];
        $new_id = getUrlName($new_name);

        //если имя не менялось
        if ($old_id === $new_id) {
            header("Location: ../homework6-shop-admin-edit-page.php?id=$old_id");
        }

        //выясним нет ли такой записи в бд
        $query = mysqli_query($link, "SELECT id FROM items WHERE id='$new_id'");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (count($data)) {
            die("Товар с таким наименованием уже есть в базе данных.");
        }

        //переименуем файлы
        $query = mysqli_query($link, "SELECT * FROM items WHERE id='$old_id'");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $extension = $data[0]['extension'];
        $old_path_small = SMALL . $old_id . '.' . $extension;
        $old_path_big = BIG . $old_id . '.' . $extension;
        $new_path_small = SMALL . $new_id . '.' . $extension;
        $new_path_big = BIG . $new_id . '.' . $extension;
        rename($old_path_small, $new_path_small);
        rename($old_path_big, $new_path_big);

        //сделаем апдейт бд
        $query = mysqli_query($link, "UPDATE items SET id='$new_id', name='$new_name' WHERE id='$old_id'");

        //вернёмся  на страничку
        header("Location: ../homework6-shop-admin-edit-page.php?id=$new_id");
    } else if (isset($_GET['cost'])) {
        $id = $_GET['id'];
        $cost = $_GET['cost'];
        $query = mysqli_query($link, "UPDATE items SET cost='$cost' WHERE id='$id'");
        header("Location: ../homework6-shop-admin-edit-page.php?id=$id");
    } else if (isset($_GET['description'])) {
        $id = $_GET['id'];
        $description = $_GET['description'];
        $query = mysqli_query($link, "UPDATE items SET description='$description' WHERE id='$id'");
        header("Location: ../homework6-shop-admin-edit-page.php?id=$id");
    } else if (isset($_POST)) {
        if ($_FILES['upload_file']['size'] > 10000000) {
            die("Размер файла более чем 10 Мегабайт.");
        }
        //ограничим тип принимаемого файла
        if ($_FILES['photo']['type'] != 'image/jpeg') {
            die("Загружаемый файл не является файлом jpeg.");
        }
        //получим данные из запроса
        $id = $_POST['id'];
        //удалим старые файлы
        $query = mysqli_query($link, "SELECT * FROM items WHERE id='$id'");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $extension = $data[0]['extension'];
        $path_small = SMALL . $id . '.' . $extension;
        $path_big = BIG . $id . '.' . $extension;
        unlink($path_small);
        unlink($path_big);
        //сгенерируем новые пути, так как расширение файла могло измениться
        $extension = getExtension($_FILES["photo"]["name"]);
        $path_small = SMALL . $id . $extension;
        $path_big = BIG . $id . $extension;
        //переместим файл и создадим уменьшенную копию не более 250*156 пикселей
        //а обычную уменьшим до 750*468
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $path_big)) {
            imageresize($path_big, $path_big, 750, 468, 100);
            imageresize($path_small, $path_big, 250, 156, 100);
        }
        //вернёмся обратно
        header("Location: ../homework6-shop-admin-edit-page.php?id=$id");
    }
}