<?php
require_once('defense.php');
require_once('db-config.php');

const ERROR =
    "<button class=\"modal-close\" id=\"modal-close\">X</button>
    <div class=\"modal-heading modal-message\">Ошибка запроса.</div>";

if($_POST['name']){
    $name = def($_POST['name']);
} else {
    die (ERROR);
}
if($_POST['phone']){
    $phone = def($_POST['phone']);
} else {
    die (ERROR);
}
if($_POST['adress']){
    $adress = def($_POST['adress']);
} else {
    die (ERROR);
}
if($_POST['comment']){
    $comment = def($_POST['comment']);
} else {
    $comment = "";
}
if ($_COOKIE['active-user']) {
    $client = $_COOKIE['active-user'];
} else {
    die
    ("<button class=\"modal-close\" id=\"modal-close\">X</button>
    <div class=\"modal-heading modal-message\">Для оформления заказа необходимо войти на сайт.</div>");
}

//добавляем запись о заказе
$query = mysqli_query($link, "INSERT INTO orders (client_id, name, phone, adress, comment) VALUES ('$client', '$name', '$phone', '$adress', '$comment')");

//в корзине проставляем номер заказа
$query = mysqli_query($link, "SELECT MAX(order_id) FROM orders");
$data = mysqli_fetch_assoc($query);
$order_id = $data['MAX(order_id)'];
$query = mysqli_query($link, "UPDATE cart SET order_id = $order_id WHERE client = '$client' AND order_id = 0");

header("Location: ../pages/order-end.php");