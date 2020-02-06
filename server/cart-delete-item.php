<?php
require_once('db-config.php');

if ($_GET['id'] && $_GET['client']) {
    $id = $_GET['id'];
    $client = $_GET['client'];
    $query = mysqli_query($link, "DELETE FROM cart WHERE client='$client' AND item_id='$id'");
    //вернём информацию о количестве итемов в корзине и их общей стоимости
    $total_count = 0;
    $total_cost = 0;
    recount($link, $client, $total_count, $total_cost);
    $result['total_count'] = $total_count;
    $result['total_cost'] = $total_cost;
    echo json_encode($result);
}


function recount($link, $client, $total_count, $total_cost){
    global $total_count;
    global $total_cost;
    $query = mysqli_query($link, "SELECT cost, count  FROM cart INNER JOIN items ON cart.item_id = items.id WHERE client = '$client'");
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($data as $i){
        $total_cost += $i['count'] * $i['cost'];
        $total_count += $i['count'];
    }
}