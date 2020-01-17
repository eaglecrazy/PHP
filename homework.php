<?php
echo "<h2>Разбираем примеры из методички123</h2>";
echo "<hr>";

echo "Hello, World!!!!";
echo "<hr>";

$name = "GeekBrains user";
echo "Hello, $name!";
echo "<hr>";

define('MY_CONST', 100);
echo MY_CONST;
echo "<hr>";

$int10 = 42;
$int2 = 0b101010;
$int8 = 052;
$int16 = 0x2A;
echo "Десятеричная система $int10 <br>";
echo "Двоичная система $int2 <br>";
echo "Восьмеричная система $int8 <br>";
echo "Шестнадцатеричная система $int16 <br>";
echo "<hr>";

$precise1 = 1.5;
$precise2 = 1.5e4;
$precise3 = 6E-8;
echo "$precise1 | $precise2 | $precise3";
echo "<hr>";

$a = 1;
echo "$a<br>";
echo '$a';
echo "<hr>";

$a = 10;
$b = (boolean) $a;
echo $b;
echo "<hr>";

$a = 'Hello,';
$b = 'world';
$c = $a . $b;
echo $c;
echo "<hr>";

$a = 4;
$b = 5;
echo $a + $b . '<br>';    // сложение
echo $a * $b . '<br>';    // умножение
echo $a - $b . '<br>';    // вычитание
echo $a / $b . '<br>';  // деление
echo $a % $b . '<br>'; // остаток от деления
echo $a ** $b . '<br>'; // возведение в степень
echo "<hr>";

$a = 4;
$b = 5;
$a += $b;
echo 'a = ' . $a . '<br>';
$a = 0;
echo $a++ . '<br>';     // Постинкремент
echo ++$a . '<br>';    // Преинкремент
echo $a-- . '<br>';     // Постдекремент
echo --$a . '<br>';    // Предекремент
echo "<hr>";

$a = 4;
$b = 5;
var_dump($a == $b);  // Сравнение по значению
var_dump($a === $b); // Сравнение по значению и типу
var_dump($a > $b);    // Больше
var_dump($a < $b);    // Меньше
var_dump($a <> $b);  // Не равно
var_dump($a != $b);   // Не равно
var_dump($a !== $b); // Не равно без приведения типов
var_dump($a <= $b);  // Меньше или равно
var_dump($a >= $b);  // Больше или равно
echo "<hr>";

echo "<h2>Объяснить, как работает данный код</h2>";
echo '$a = 5;<br>';
echo '$b = \'05\'<br>';
echo 'var_dump($a == $b) //Почему true?<br>';
echo 'Потому что при сравнении числа и строки строка преобразуется в число и тогда сравниваются два числа 5.<br><br>';

echo 'var_dump((int)\'012345\'); //Почему 12345?<br>';
echo 'Потому что строка \'012345\' приводится к типу int, и во время приведения убирается первый ноль.<br><br>';

echo 'var_dump((float)123.0 === (int)123.0); //Почему false?<br>';
echo 'Потому что сравниваются не только значения, но и типы данных.<br><br>';

echo 'var_dump((int)0 === (int)\'hello, world\'); //Почему true?<br>';
echo 'Потому что когда не удаётся сделать приведение строки к типу, то результатом операции приведения является 0.';
echo "<hr>";

echo "<h2>Меняем значения переменнных местами</h2>";

$a = 1;
$b = 2;

echo "\$a = " . $a . " \$b = " . $b . "<br>";
$a = $a + $b;//3
$b = $a - $b;//1
$a = $a - $b;//2
echo "\$a = " . $a . " \$b = " . $b;