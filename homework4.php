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
    $photos = scandir("img/small");
    for ($i = 2; $i < count($photos); $i++) {
        $photo = $i - 2;
        if ($photo < 10) {
            $photo = "0" . $photo;
        } ?>

        <a href="homework4-show.php?name=big<?= $photo ?>"><img class="small-image"
                                                                src="img/small/small<?= $photo ?>.jpg"
                                                                alt="small<?= $photo ?>"></a>
    <?php } ?>
</div>
<div class="modal hidden" id="modal">
    <img src="img/big/big00.jpg" alt="">
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>

    const $modal = $("#modal");

    $(".small-image").click(function (e) {
        e.preventDefault();
        $modal.toggleClass("hidden");
        $modal.fadeIn("slow", function () {
        });
    });


    $modal.click(function () {
        $modal.fadeOut("slow", function () {
        });
    });
</script>

</body>
</html>



