<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);

    $email = $data['email'];

    $title = $data['title'];

    $content = $data['content'];

    $cover_Image = $data['cover_image'];

    $category = $data['category'];

    $meta_description = $data['meta_description'];

    $con = mysqli_connect("localhost","root","","smartbook");

    $q = "INSERT INTO posts (title , content, email , view , cover_image , category , meta_description , approval ) VALUES
        ('$title', '$content', '$email' , 0 , '$cover_Image','$category','$meta_description' , 'false')";

    mysqli_query($con,$q);

    echo json_encode(["msg" => "Post saved successfully."],JSON_PRETTY_PRINT); 

?>