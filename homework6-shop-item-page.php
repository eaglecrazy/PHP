<?php

require_once('homework6-shop-config.php');
if(isset($_GET)) {
    require_once('components/homework6-shop-header.php');
    require_once('components/homework6-shop-item.php');
    require_once('components/homework6-shop-footer.php');
    $title = "PHP Shop. Item";

//$scripts = '<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
//<script src="scripts/homework6-calc.js"></script>';

    $tpl = file_get_contents('homework6-template.tpl');
    $patterns = ['/{title}/', '/{styles}/', '/{header}/', '/{main}/', '/{footer}/', '/{scripts}/'];
    $replace = [$title, $styles, $header, $main, $footer, $scripts];
    $ww = preg_replace($patterns, $replace, $tpl);
    echo preg_replace($patterns, $replace, $tpl);
}