<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>
<body>
<div class="photos">
<!--  генерация галереи  -->
<?php require_once("homework4-gallery.php")?>
</div>
<hr>

<!-- Почему то у меня не отправляется файл есть указать method="post", нужны большие буквы чтобы работало. Почему? -->
<form action="homework4-add-file.php" method="POST" enctype="multipart/form-data">
    <label for="#file-input">Загрузка файла на сервер.</label><br>
    <input type="file" id="file-input" name="file-input" accept=".jpg"><br>
    <input type="submit" id="submit">
</form>



<div class="modal hidden" id="modal">
    <img id="big-image" src="img/big/big00.jpg" alt="">
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- скрипт модального окна -->
<script src="scripts/gallery.js"></script>
<script src="scripts/upload.js"></script>
</body>
</html>



