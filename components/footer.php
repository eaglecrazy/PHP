<?php

//настроим ссылки в хидере
$link_admin = LINK_ADMIN;

if ($_SERVER['REQUEST_URI'] === LINK_ADMIN)
    $link_admin = LINK_EMPTY;

$footer = "<a href=\"$link_admin\" class=\"button indexButton\">Админка</a>";