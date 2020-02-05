<?php
define("LINK_INDEX", "../pages/index.php");
define("LINK_FORM", "#");
define("LINK_CART", "../pages/cart-page.php");
define("LINK_ADMIN", "../pages/admin-page.php");
define("LINK_EMPTY", "#");

$styles =
    '<link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/main.css">';

$cross = "
<svg viewBox=\"0 0 52 52\" class=\"cart-item-cross\">
    <path d=\"M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M26,50C12.767,50,2,39.233,2,26S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z\"></path>
    <path d=\"M35.707,16.293c-0.391-0.391-1.023-0.391-1.414,0L26,24.586l-8.293-8.293c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414L24.586,26l-8.293,8.293c-0.391,0.391-0.391,1.023,0,1.414C16.488,35.902,16.744,36,17,36s0.512-0.098,0.707-0.293L26,27.414l8.293,8.293C34.488,35.902,34.744,36,35,36s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414L27.414,26l8.293-8.293C36.098,17.316,36.098,16.684,35.707,16.293z\"></path>
</svg>";



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