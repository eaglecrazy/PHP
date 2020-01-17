<?php

//1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
$a = rand(-100, 100);
$b = rand(-100, 100);
//Затем написать скрипт, который работает по следующему принципу:
//если $a и $b положительные, вывести их разность;
//если $а и $b отрицательные, вывести их произведение;
//если $а и $b разных знаков, вывести их сумму;
//ноль можно считать положительным числом.
echo 'a = ' . $a . '<br>';
echo 'b = ' . $b . '<br>';
if ($a >= 0 && $b >= 0) {
    echo 'a - b = ' . ($a - $b);
} else if ($a < 0 && $b < 0) {
    echo 'a * b = ' . ($a * $b);
} else {
    echo 'a + b = ' . ($a + $b);
}

echo '<hr>';

//2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.
$a = rand(0, 15);
echo 'a = ' . $a . '<br>';
switch ($a) {
    case 0 :
        echo 0 . '<br>';
    case 1 :
        echo 1 . '<br>';
    case 2 :
        echo 2 . '<br>';
    case 3 :
        echo 3 . '<br>';
    case 4 :
        echo 4 . '<br>';
    case 5 :
        echo 5 . '<br>';
    case 6 :
        echo 6 . '<br>';
    case 7 :
        echo 7 . '<br>';
    case 8 :
        echo 8 . '<br>';
    case 9 :
        echo 9 . '<br>';
    case 10 :
        echo 10 . '<br>';
    case 11 :
        echo 11 . '<br>';
    case 12 :
        echo 12 . '<br>';
    case 13 :
        echo 13 . '<br>';
    case 14 :
        echo 14 . '<br>';
    default :
        echo 15 . '<br>';
}

echo '<hr>';

//3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.
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
        echo 'На ноль делить нельзя.';
        return NAN;
    }
    return $a / $b;
}

//4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
//где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
// В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3)
// и вернуть полученное значение (использовать switch).

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
            echo 'Операции ' . $operation . ' не существует.';
    }
}

echo '20 + 10 = ' . mathOperation(20, 10, '+') . '<br>';
echo '20 - 10 = ' . mathOperation(20, 10, '-') . '<br>';
echo '20 * 10 = ' . mathOperation(20, 10, '*') . '<br>';
echo '20 / 10 = ' . mathOperation(20, 10, '/') . '<br>';
echo '<hr>';

//5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.
echo 'Делал это в прошлом задании, в шаблоне минималистика. Вот текущий год ' . date('Y') . '<br>';
echo '<hr>';

//6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
function power($val, $pow)
{
    if ($pow == 0) {
        return 1;
    }
    return $val * power($val, $pow - 1);
}

echo '2 в степени 8 = ' . power(2, 8);
echo '<hr>';

//7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
//22 часа 15 минут
//21 час 43 минуты
function mytime($hour, $min)
{
    $tempMin = $min;
    $minEnd = '';
    if ($min > 20) {
        $tempMin = $min % 10;
    }
    if ($tempMin === 1) {
        $minEnd = 'a';
    } else if ($tempMin >= 2 && $tempMin <= 4) {
        $minEnd = 'ы';
    }
    $hourEnd = '';
    if (($hour >= 5 && $hour <= 20) || $hour == 0) {
        $hourEnd = 'ов';
    } else if (($hour >= 2 && $hour <= 4) || $hour == 22 || $hour == 23) {
        $hourEnd = 'a';
    }
    return $hour . ' час' . $hourEnd . ' ' . $min . ' минут' . $minEnd;
}
echo mytime(rand(0, 23), rand(0, 59)) . '<br>';
echo mytime(rand(0, 23), rand(0, 59)) . '<br>';
echo mytime(rand(0, 23), rand(0, 59)) . '<br>';
echo mytime(rand(0, 23), rand(0, 59)) . '<br>';
echo mytime(rand(0, 23), rand(0, 59)) . '<br>';
echo mytime(rand(0, 23), rand(0, 59)) . '<br>';
echo mytime(rand(0, 23), rand(0, 59)) . '<br>';
echo mytime(rand(0, 23), rand(0, 59)) . '<br>';
echo mytime(rand(0, 23), rand(0, 59)) . '<br>';
