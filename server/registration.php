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

    $query = mysqli_query($link, "SELECT * FROM clients WHERE login='$login'");
    if (mysqli_num_rows($query)) {
        die('Такой пользователь уже существует.');
    }

    $query = mysqli_query($link, "INSERT INTO clients(login, password) VALUES ('$login', '$password')");
    setcookie("$login-login", $login, time()+3600*24*7, '/');
    setcookie("$login-password", $password, time()+3600*24*7, '/');
    setcookie('active-user', $login, time()+3600*24*7, '/');

    header("Location: ../pages/index.php");
}
