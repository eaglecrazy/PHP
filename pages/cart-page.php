<?php
require_once('../config.php');
if(isset($_GET)) {
    $scripts = "
        <script defer src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>
        <script defer src=\"../scripts/cart.js\"></script>";
    require_once('../components/header.php');
    require_once('../components/cart.php');
    require_once('../components/footer.php');
    $title = "PHP Shop. Item";

    $tpl = file_get_contents('../template.tpl');
    $patterns = ['/{title}/', '/{styles}/', '/{header}/', '/{main}/', '/{footer}/', '/{scripts}/'];
    $replace = [$title, $styles, $header, $main, $footer, $scripts];
    echo preg_replace($patterns, $replace, $tpl);
}