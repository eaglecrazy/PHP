<?php

require_once('config.php');
if(isset($_GET)) {
    require_once('components/header.php');
    require_once('components/item.php');
    require_once('components/footer.php');
    $title = "PHP Shop. Item";

//$scripts = '<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
//<script src="scripts/homework6-homework6 - calc.js"></script>';

    $tpl = file_get_contents('template.tpl');
    $patterns = ['/{title}/', '/{styles}/', '/{header}/', '/{main}/', '/{footer}/', '/{scripts}/'];
    $replace = [$title, $styles, $header, $main, $footer, $scripts];
    $ww = preg_replace($patterns, $replace, $tpl);
    echo preg_replace($patterns, $replace, $tpl);
}