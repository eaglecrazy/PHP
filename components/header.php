<?php
//настроим ссылки в хидере
$link_index = LINK_INDEX;
$link_cart = LINK_CART;
$link_form = LINK_FORM;
if ($_SERVER['REQUEST_URI'] === LINK_INDEX)
    $link_index = LINK_EMPTY;
else if ($_SERVER['REQUEST_URI'] === LINK_CART)
    $link_cart = LINK_EMPTY;
else if ($_SERVER['REQUEST_URI'] === LINK_FORM)
    $link_form = LINK_EMPTY;

$scripts .= '<script defer src="scripts/modal-window.js"></script>';
$header = "
    <div class=\"menuLeft\">
        <a href=\"$link_index\" class=\"button indexButton\">Магазин</a>
        <a href=\"$link_form\" class=\"button formButton hidden\">Обратная связь</a>
    </div>
    <div class=\"menuRight\">
        <form class=\"searchForm hidden\"><input type=\"text\" placeholder=\"\" class=\"searchInput form-input\">
            <button class=\"button searchButton\">Поиск</button>
        </form>
        <button class=\"button cartButton\" id=\"button-lk\">Личный кабинет</button>
        <a  href=\"$link_cart\" class=\"button cartButton\">Корзина</a>
    </div>
    <div class=\"modal hidden\" id=\"modal\"></div>";

