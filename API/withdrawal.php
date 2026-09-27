<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $con = mysqli_connect("localhost","root","","smartbook");
    
    $q = "SELECT 
        p1.email,p1.name,p1.image_path,
        w1.id,w1.method,w1.upi_id ,w1.account_holder,w1.bank_name , w1.account_number , w1.ifsc , w1.amount , w1.created_at
    FROM profiles AS p1
    INNER JOIN withdrawal_request AS w1 
        ON p1.email = w1.email
    WHERE w1.status = 'Pending'
    ORDER BY w1.id DESC";

    $sql = mysqli_query($con , $q);

    $array_data = mysqli_fetch_all($sql , MYSQLI_ASSOC);

    $json_data = json_encode($array_data , JSON_PRETTY_PRINT);

    echo $json_data;
?>