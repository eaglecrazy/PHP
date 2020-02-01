<?php

define("LINK_INDEX", "/homework6-shop-index.php");
define("LINK_FORM", "/homework6-shop-form.php");
define("LINK_CART", "/homework6-shop-cart.php");
define("LINK_ADMIN", "/homework6-shop-admin.php");
define("LINK_EMPTY", "#");


$title = "PHP Shop";
$styles =
    '<link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/homework6-shop-main.css">';
require_once('homework6-shop-header.php');
require_once('homework6-shop-main.php');
require_once('homework6-shop-footer.php');
//$footer = "";
//$scripts = '<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
//<script src="scripts/homework6-calc.js"></script>';




$tpl = file_get_contents('homework6-template.tpl');
$patterns = ['/{title}/', '/{styles}/', '/{header}/', '/{main}/', '/{footer}/', '/{scripts}/'];
$replace = [$title, $styles, $header, $main, $footer, $scripts];
$ww = preg_replace($patterns, $replace, $tpl);
echo preg_replace($patterns, $replace, $tpl);