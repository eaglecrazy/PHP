<?php

function renderGallery($link)
{
    $query = mysqli_query($link, "SELECT * FROM images");
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $result = "";
    foreach ($data as $photo){
        $id = $photo['id'];
        $path = $photo['path'];

        $result .=
            "<a href=\"homework5-show.php?name=big$id\">
                <img class=\"small-image\" src=\"$path\" alt=\"small$id\" data-number=\"$id\">
            </a>";
    }
    return $result;
}

require_once("homework5-config.php");
echo renderGallery($link);
