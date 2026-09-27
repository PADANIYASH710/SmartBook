<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);
    
    $email = $data['email'];

    $image_path = $data['image_path'];
    $name = $data['fullName'] ?? '';
    $bio = $data['bio'] ?? '';
    $dob = $data['dob'] ?? '';
    $gender = $data['gender'] ?? '';
    $city = $data['city'] ?? ''; 
    $state = $data['state'] ?? ''; 
    $country = $data['country'] ?? ''; 
    $language = $data['language'] ?? ''; 
    $interests = $data['interests'] ?? '';

    $con = mysqli_connect("localhost","root","","smartbook");

    //   Profile Table

    $q = "update profiles set name = '$name' , bio = '$bio', dob = '$dob', gender = '$gender', city = '$city', state = '$state', country = '$country', language = '$language', interests = '$interests', image_path = '$image_path' where email = '$email'";
    
    mysqli_query($con, $q);

    //  Comment Table

    $q = "update comments set profile = '$image_path' , name = '$name' where email = '$email'";

    mysqli_query($con, $q);

    echo json_encode(["msg" => "Post saved successfully."],JSON_PRETTY_PRINT);

?>