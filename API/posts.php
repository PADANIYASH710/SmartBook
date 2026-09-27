<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $con = mysqli_connect("localhost","root","","smartbook");

    $q = "select id , title , created_at , email , cover_image , category from posts where approval != 'true' ORDER BY id DESC";

    $sql = mysqli_query($con , $q);

    $array_data = mysqli_fetch_all($sql , MYSQLI_ASSOC);

    $json_data = json_encode($array_data , JSON_PRETTY_PRINT);

    echo $json_data;
    
?>