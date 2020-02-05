<?php
$scripts = "<script defer src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>";
require_once('../config.php');
require_once('../components/header.php');
require_once('../components/admin-edit.php');
require_once('../components/footer.php');
$title = "PHP Shop. Admin edit";
$tpl = file_get_contents('../template.tpl');
$patterns = ['/{title}/', '/{styles}/', '/{header}/', '/{main}/', '/{footer}/', '/{scripts}/'];
$replace = [$title, $styles, $header, $main, $footer, $scripts];
$ww = preg_replace($patterns, $replace, $tpl);
echo preg_replace($patterns, $replace, $tpl);