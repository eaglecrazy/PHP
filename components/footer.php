<?php

//настроим ссылки в хидере
$link_admin = LINK_ADMIN;

$footer = '';

if ($_SERVER['REQUEST_URI'] === LINK_ADMIN)
    $link_admin = LINK_EMPTY;
if($_COOKIE['active-user'] === 'admin')
    $footer = "<a href=\"$link_admin\" class=\"button indexButton\">Админка</a>";
