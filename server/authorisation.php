<?php
require_once('db-config.php');
if (isset($_POST)) {
    if (isset($_POST['login']) && $_POST['login'] != '') {
        $login = strip_tags($_POST['login']);
    } else {
        die('Вы ввели некорректный логин.');
    }
    if (isset($_POST['password']) && $_POST['password'] != '') {
        $password = strip_tags($_POST['password']);
    } else {
        die('Вы ввели некорректный пароль.');
    }

    $query = mysqli_query($link, "SELECT * FROM clients WHERE login='$login' AND password='$password'");
    if (!mysqli_num_rows($query)) {
        die('Неправильный логин или пароль.');
    }
    setcookie("$login-login", $login, time()+3600*24*7, '/');
    setcookie("$login-password", $password, time()+3600*24*7, '/');
    setcookie('active-user', $login, time()+3600*24*7, '/');
    $page = $_SERVER['HTTP_REFERER'];
    header("Location: $page");
}
