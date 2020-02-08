<?php

require_once('../server/db-config.php');
$id = $_GET['id'];
$query = mysqli_query($link, "SELECT * FROM items WHERE id='$id'");
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
$name = $data[0]['name'];
$description = $data[0]['description'];
$cost = $data[0]['cost'];
$extension = $data[0]['extension'];
$main =
    "<article class=\"item-wrap\">
        <div class=\"item-info-wrap\">
            <h2 class=\"item-info-heading\">$name</h2>
            <p class=\"item-info-description\">$description</p>
            <span class=\"item-info-cost\">$cost рублей.</span>
            <a href=\"../server/add-item-to-cart.php?client=$active_user&item=$id\" class=\"button item-info-button\">Добавить в корзину</a>
        </div>
        <img src=\"../img/big/$id.$extension\" alt=\"$name\" class=\"item-info-image\" width=\"748\" height=\"472\">
    </article>";