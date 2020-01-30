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

    <?php
    require_once("homework5-gallery.php")
    ?>
</div>
<hr>


<form action="homework5-add-file.php" method="POST" enctype="multipart/form-data">
    <label for="#file-input">Загрузка файла на сервер.</label><br>
    <input type="file" id="file-input" name="file-input" accept=".jpg"><br>
    <input type="submit" id="submit">
</form>


<div class="modal hidden" id="modal">
    <img id="big-image" src="#" alt="">
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="scripts/gallery.js"></script>
<script src="scripts/homework5_upload.js"></script>
</body>
</html>



