<?php
require_once('db-config.php');

if ($_GET['client']) {
    $client = $_GET['client'];
} else {
    die('Ошибка, не задан покупатель.');
}
if ($_GET['item']) {
    $item = $_GET['item'];
} else {
    die('Ошибка, не задан товар.');
}

//узнаем есть ли уже этот товар у этого клиента в бд
$query = mysqli_query($link, "SELECT * FROM cart WHERE client='$client' AND item_id = '$item'");
if (mysqli_num_rows($query)) {//если есть
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $count = $data[0]['count'] + 1;
    $query = mysqli_query($link, "UPDATE cart SET count=$count WHERE client='$client' AND item_id = '$item'");
} else {//если нет
    $query = mysqli_query($link, "INSERT INTO `cart`(`client`, `item_id`, `count`) VALUES ('$client', '$item', 1)");
}
header("Location: ../pages/item-page.php?id=$item");