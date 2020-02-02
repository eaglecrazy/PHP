<?php

require_once('homework6-shop-db-config.php');

if (isset($_GET)) {
    $id = $_GET['id'];
    $query = mysqli_query($link, "SELECT * FROM items WHERE id='$id'");
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

    $name = $data[0]['name'];
    $cost = $data[0]['cost'];
    $description = $data[0]['description'];
    $extension = $data[0]['extension'];
    $path_big = "img/big/$id.$extension";
}

$main = "<form class=\"add-item\" action=\"../homework6-shop-add-item.php\" method=\"POST\" enctype=\"multipart/form-data\">
        <h2 class=\"form-heading\">Изменение товара</h2>
        <label class=\"form-label\" for=\"name\">Наименование товара</label>
        <input type=\"text\" name=\"name\" id=\"name\" class=\"form-add-input\" required value=\"$name\">
        <label class=\"form-label\" for=\"cost\">Стоимость товара</label>
        <input type=\"number\" name=\"cost\" id=\"cost\" class=\"form-add-input\" required value=\"$cost\">
        <label class=\"form-label\" for=\"description\">Описание товара</label>
        <textarea name=\"description\" id=\"description\" cols=\"30\" rows=\"10\" class=\"form-add-input\" required>$description</textarea>
        <label class=\"form-label\" for=\"photo\">Загрузка фотографии</label>
        <input type=\"file\" name=\"photo\" id=\"photo\" class=\"form-add-input\" accept=\"image/jpeg\" required value=\"$path_big\">
        <input type=\"submit\" value=\"Сохранить\" class=\"form-add-input\">
    </form>";