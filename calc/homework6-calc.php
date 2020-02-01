<?php
$title = "Calc";
$header = "";
$footer = "";
$styles = '<link rel="stylesheet" href="../styles/homework6-calc-style.css">';
$scripts = '<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="scripts/homework6-calc.js"></script>';

$main =
'<form action="homework6-calc-server.php" method="GET" class="form">
<fieldset class="fieldset">
    <input type="number" class="operand" name="operand[]" value="2">
    <select name="select" class="select">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" class="operand" name="operand[]" value="2">
    <span class="equal">=</span>
    <input type="number" class="result" name="result">
</fieldset>
<fieldset class="fieldset">
        <button class="sign" id="plus">+</button>
        <button class="sign" id="minus">-</button>
        <button class="sign" id="multiple">*</button>
        <button class="sign" id="divide">/</button>
        <input type="submit" class="submit" value="Посчитать">
    </fieldset>
</form>';

$tpl = file_get_contents('homework6-template.tpl');
$patterns = ['/{title}/', '/{styles}/', '/{header}/', '/{main}/', '/{footer}/', '/{scripts}/'];
$replace = [$title, $styles, $header, $main, $footer, $scripts];
echo preg_replace($patterns, $replace, $tpl);