<?php

$styles .= '<link rel="stylesheet" href="../styles/cart.css">';
require_once('../server/db-config.php');

$query = mysqli_query($link, "SELECT * FROM cart INNER JOIN items ON cart.item_id = items.id WHERE client = '$active_user'");
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

$main_start = " <div class=\"cart-wrapper\"><div class=\"cart-items\">";
$main_content = '';

foreach ($data as $item){



}


//                <div class=\"cart-item\"><img src=\"../img/game.jpg\" width=\"250\" height=\"156\" alt=\"Мышка\" class=\"item-image\">
////                    <div class=\"cart-item-info\"><h3 class=\"goods-item-heading\">Мышка</h3>
////                        <p class=\"goods-item-text cart-item-price\">Цена: 100 рублей.</p>
////                        <input type=\"number\" min=\"1\" max=\"99\" class=\"cart-item-quantity\">
////                    </div>
////                    $cross
////                </div>
$main_end ="
    </div>
    <div class=\"cart-info\"><span class=\"cart-info-text\">Всего товаров:</span><span
            class=\"cart-info-text cart-info-quantity\">5 шт.</span> <span
            class=\"cart-info-text\">Общая стоимость:</span><span
            class=\"cart-info-text cart-info-price\">760 руб.</span>
        <button class=\"button cart-issue-button\">Перейти к оформлению</button>
    </div>
</div>";

$main = $main_start . $main_content . $main_end;