<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $con = mysqli_connect("localhost","root","","smartbook");

    $q = "SELECT 
    p1.email, p1.name, p1.dob, p1.gender, p1.city, p1.country, p1.image_path, p1.created_at,
 COUNT(p2.id) AS total_posts, COALESCE(SUM(p2.view), 0) AS total_views FROM profiles AS p1 LEFT JOIN posts AS p2
    ON p1.email = p2.email GROUP BY 
    p1.email, p1.name, p1.dob, p1.gender, p1.city,p1.country,p1.image_path,p1.created_at
ORDER BY p1.created_at ASC";

    $sql = mysqli_query($con , $q);

    $array_data = mysqli_fetch_all($sql , MYSQLI_ASSOC);

    $json_data = json_encode($array_data , JSON_PRETTY_PRINT);

    echo $json_data;
    
?>