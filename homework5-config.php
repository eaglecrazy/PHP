<?php
const SERVER = "localhost";
const LOGIN = "root";
const PASS = "";
const DB = "gallery";
$link = mysqli_connect(SERVER, LOGIN, PASS, DB);
if (mysqli_connect_errno()) {
    die("Connect failed" . mysqli_connect_error());
}