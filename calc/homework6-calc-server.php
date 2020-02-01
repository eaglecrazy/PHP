<?php
print_r(mathOperation($_GET['op1'], $_GET['op2'], $_GET['sign']));

function sum($a, $b)
{
    return $a + $b;
}

function sub($a, $b)
{
    return $a - $b;
}

function mul($a, $b)
{
    return $a * $b;
}

function div($a, $b)
{
    if ($b == 0) {
        die('На ноль делить нельзя.');
    }
    return $a / $b;
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case '+' :
            return sum($arg1, $arg2);
        case '-' :
            return sub($arg1, $arg2);
        case '*' :
            return mul($arg1, $arg2);
        case '/' :
            return div($arg1, $arg2);
        default :
            die('Ошибка');
    }
}