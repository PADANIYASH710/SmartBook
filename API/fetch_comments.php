<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);

    $post_id = $data['post_id'];

    $con = mysqli_connect("localhost","root","","smartbook");

    $q = "select name, created_at , comment , unread , profile from comments where  post_id = $post_id ORDER BY id DESC";

    $sql = mysqli_query($con ,$q);

    $array_data = mysqli_fetch_all($sql,MYSQLI_ASSOC);

    $json_data = json_encode($array_data,JSON_PRETTY_PRINT);

    echo $json_data;

    $q = "update comments set unread = '' where post_id = $post_id";

    mysqli_query($con,$q);

?>