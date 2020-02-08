<?php
define("LINK_INDEX", "../pages/index.php");
define("LINK_FORM", "#");
define("LINK_CART", "../pages/cart-page.php");
define("LINK_ADMIN", "../pages/admin-page.php");
define("LINK_EMPTY", "#");

$styles =
    '<link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/main.css">';



$active_user = '';
if ($_COOKIE['active-user'])
    $active_user = $_COOKIE['active-user'];

//если есть активный юзер и у него есть логин и пароль
if ($active_user && $_COOKIE["$active_user-login"] && $_COOKIE["$active_user-password"]){
    $login = $_COOKIE["$active_user-login"];
    $password = $_COOKIE["$active_user-password"];
    //проверим их корректность в БД
    require_once('../server/db-config.php');
    $query = mysqli_query($link, "SELECT * FROM clients WHERE login='$login' AND password='$password'");
    //если запрос не дал результатов то
    if (!mysqli_num_rows($query)) {
        setcookie('active-user', '', time()+1, '/');
        $active_user = '';
    }
}