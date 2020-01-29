<?php

function renderGallery($link)
{
    $query = mysqli_query($link, "SELECT * FROM images");
    $data = mysqli_fetch_assoc($query);
    $result = "";
//    print_r($data);
    foreach ($data as $img){
        $result .=
            "<a href=\"homework5-show.php?name=big$photo\">
                <img class=\"small-image\" src=\"img/small/small$photo.jpg\" alt=\"small$photo\" data-number=\"$photo\">
            </a>";
    }

    return $result;

//    $photos = scandir("img/small");
//    $result = "";
//    for ($i = 2; $i < count($photos); $i++) {
//        $photo = $i - 2;
//        if ($photo < 10) {
//            $photo = "0" . $photo;
//        }
//
//        $result .=
//            "<a href=\"homework5-show.php?name=big$photo\">
//                <img class=\"small-image\" src=\"img/small/small$photo.jpg\" alt=\"small$photo\" data-number=\"$photo\">
//            </a>";
//    }
//    return $result;
}

require_once("homework5-config.php");
echo renderGallery($link);
