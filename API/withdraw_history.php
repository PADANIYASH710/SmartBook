<?php
    
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);
    
    $email = $data["email"];

    $con = mysqli_connect("localhost","root","","smartbook");
    /*  Fetch Record   */
    
    $q = "select created_at , amount , method , status from withdrawal_request where email = '$email' ORDER BY id DESC";

    $sql = mysqli_query($con,$q);

    $array_data = mysqli_fetch_all($sql , MYSQLI_ASSOC);

    $json_data = json_encode($array_data ,JSON_PRETTY_PRINT);

    echo $json_data;

?>