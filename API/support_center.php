<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);
    
    $email = $data['email'];
    $subject = $data['subject'];
    $description = $data['description'];

    $con = mysqli_connect("localhost","root","","smartbook");
    
    $q = "INSERT INTO support (email , subject , description )
          VALUES ('$email','$subject','$description')";

    mysqli_query($con , $q);

    echo json_encode(["msg" => "Successfully."],JSON_PRETTY_PRINT);

?>