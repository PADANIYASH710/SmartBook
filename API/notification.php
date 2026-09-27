<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);
    
    $email = $data['email'];
    
    $notification = $data['notification'] ?? '';
    
    $unread = $data['unread'] ?? '';

    $con = mysqli_connect("localhost","root","","smartbook");

    if($notification){

        $q = "select icon , title , description , created_at , unread from notifications where email = '$email' ORDER BY id DESC";

        $sql = mysqli_query($con,$q);

        $array_data = mysqli_fetch_all($sql , MYSQLI_ASSOC);

        $json_data = json_encode($array_data ,JSON_PRETTY_PRINT);

        echo $json_data;

    }

    if($unread){

        $q = "update notifications set unread = null where email = '$email'";

        $sql = mysqli_query($con,$q);

    }
?>