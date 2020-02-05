<?php

if (isset($_GET)) {
    setcookie('active-user', '', time()+3600, '/');
    header("Location: ../pages/index.php");
}
