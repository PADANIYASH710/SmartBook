<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);
    $email = $data['email'];

    $con = mysqli_connect("localhost","root","","smartbook");

    $q = "SELECT 
            p.id, p.cover_image, p.category, p.title ,p.meta_description , p.view , p.created_at , p.approval ,
            COUNT(c.id) AS comment_count
        FROM posts AS p
        LEFT JOIN comments AS c 
            ON p.id = c.id
        where p.email = '$email'
        GROUP BY p.id
        ORDER BY p.id DESC";    

    $sql = mysqli_query($con ,$q);

    $data = mysqli_fetch_all($sql , MYSQLI_ASSOC);

    $output = json_encode($data ,JSON_PRETTY_PRINT);

    echo $output;
?>