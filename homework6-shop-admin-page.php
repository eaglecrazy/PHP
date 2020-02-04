<?php

require_once('homework6-shop-config.php');
require_once('components/homework6-shop-header.php');
require_once('components/homework6-shop-admin.php');
require_once('components/homework6-shop-footer.php');
$title = "PHP Shop. Admin";
$tpl = file_get_contents('homework6-template.tpl');
$patterns = ['/{title}/', '/{styles}/', '/{header}/', '/{main}/', '/{footer}/', '/{scripts}/'];
$replace = [$title, $styles, $header, $main, $footer, $scripts];
$ww = preg_replace($patterns, $replace, $tpl);
echo preg_replace($patterns, $replace, $tpl);