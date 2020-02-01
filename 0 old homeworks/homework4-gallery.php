<?php

function renderGallery()
{
    $photos = scandir("img/small");
    $result = "";
    for ($i = 2; $i < count($photos); $i++) {
        $photo = $i - 2;
        if ($photo < 10) {
            $photo = "0" . $photo;
        }

        $result .=
            "<a href=\"homework4-show.php?name=big$photo\">
                <img class=\"small-image\" src=\"img/small/small$photo.jpg\" alt=\"small$photo\" data-number=\"$photo\">    
            </a>";
    }
    return $result;
}
echo renderGallery();
