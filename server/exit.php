<?php

if (isset($_GET)) {
    setcookie('active-user', '', time()+3600*24*7, '/');
    header("Location: ../pages/index.php");
}
