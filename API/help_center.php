<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $con = mysqli_connect("localhost","root","","smartbook");

    $q = "SELECT 
            s.id,s.email,s.subject,s.description,s.created_at,
            p.name,p.image_path
         FROM support AS s
         INNER JOIN profiles AS p
         ON s.email = p.email";

    $sql = mysqli_query($con,$q);

    $array_data = mysqli_fetch_all($sql , MYSQLI_ASSOC);

    $json_data = json_encode($array_data , JSON_PRETTY_PRINT);

    echo $json_data;

?>