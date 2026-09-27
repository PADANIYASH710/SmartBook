<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);

    $email = $data['email'];

    $post_id = $data['post_id'];

    $comment = $data['comment'];

    $con = mysqli_connect("localhost","root","","smartbook");

    $q = "select name , image_path from profiles where email = '$email'";

    $sql = mysqli_query($con ,$q);

    $data = mysqli_fetch_assoc($sql);

    $profile = $data['image_path'];

    $name = $data['name'];

    if($name == ""){
        $name = 'Unknown Name';
    }

    $q = "insert into comments ( email , profile , comment , name , post_id , unread) value ('$email' , '$profile' , '$comment' , '$name' , $post_id , 'true')";

    mysqli_query($con , $q);

    echo json_encode(["msg" => "Comment added successfully."],JSON_PRETTY_PRINT);

?>