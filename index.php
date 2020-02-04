<?php

$scripts = "<script defer src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>";
require_once('config.php');
require_once('components/header.php');
require_once('components/main.php');
require_once('components/footer.php');
$title = "PHP Shop. Index";

$tpl = file_get_contents('template.tpl');
$patterns = ['/{title}/', '/{styles}/', '/{header}/', '/{main}/', '/{footer}/', '/{scripts}/'];
$replace = [$title, $styles, $header, $main, $footer, $scripts];
$ww = preg_replace($patterns, $replace, $tpl);
echo preg_replace($patterns, $replace, $tpl);


//
//1. Создать модуль корзины. В неё можно добавлять товары, а можно удалять товары из неё.
//| Запрос                   | Данные запроса                       | Данные ОК ответа           | Данные ответа с ошибкой                              | Данные ОК ответа JSON                                                         | Данные ответа JSON с ошибкой                                                          | Комментарий |
//|--------------------------|--------------------------------------|------------------          |-------------------------                             |-----------------------|-----------------------------------------------------  |---------------------------------------------------------------------------------------|
//| Добавить товар в корзину | {"id_product" : 123, "quantity" : 1} | (string) 1 | (string) 0    | { result: 1 }                                        | { result: 0, errorMessage : "Сообщение об ошибке" }                           | Подразумевается, что целевая корзина пользователя идентифицируется на стороне сервера |
//| Удалить товар из корзины | {"id_product" : 123} | (string) 1    | (string) 0 | { result: 1 } | { result: 0, errorMessage : "Сообщение об ошибке" }  |                                                                               |
//
//Использовать также сущность good в качестве товара!
//2. Создать модуль личного кабинета, на который будет перенаправляться пользователь после логина. Вывести там имя, логин и приветствие.
//3. *Создать модуль регистрации пользователя (см. ссылку в доп. материалах).