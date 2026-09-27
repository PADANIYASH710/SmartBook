<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);
    $id = $data['id'];

    $con = mysqli_connect("localhost","root","","smartbook");

    if($data['post_type'] == "site"){

        $q = "update posts set view = view + 1 where id = $id";
        
        mysqli_query($con ,$q);
    }

    $q = "select title , content , created_at , cover_image , meta_description from posts where id = $id";

    $sql = mysqli_query($con ,$q);

    $data = mysqli_fetch_all($sql , MYSQLI_ASSOC);

    $output = json_encode($data ,JSON_PRETTY_PRINT);

    echo $output;

?>
