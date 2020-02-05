<?php

require_once('../server/db-config.php');
$query = mysqli_query($link, 'SELECT * FROM items ORDER BY id ');
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

$main_start = '<div class="goods-list">';
$main_end = '</div>';
$main_content = '';

foreach ($data as $item) {
    $main_content .= "
<div class=\"goods-item\">
    <div class=\"goods-item-heading-wrap\">
        <h3 class=\"goods-item-heading\">$item[name]</h3>
    </div>
    <img src=\"../img/small/$item[id].$item[extension]\" width=\"250\" height=\"156\" alt=\"$item[name]\" class=\"item-image\">
    <p class=\"goods-item-text\">Цена: $item[cost] рублей</p>
    <a href=\"item-page.php?id=$item[id]\" class=\"button\">Подробнее</a>
</div>";
}
$main = $main_start . $main_content . $main_end;