<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$data = json_decode(file_get_contents("php://input"),true);
$email = $data['email'];

$con = mysqli_connect("localhost","root","","smartbook");
    
$q = "SELECT * FROM profiles WHERE email='$email'";
$result = mysqli_query($con, $q);

    if(mysqli_num_rows($result) == 0){

        $q = "INSERT INTO notifications (email , icon ,title , description , unread)
        VALUES ('$email','fa-solid fa-bell','Welcome to SmartBook','Thank you for joining SmartBook. We hope you enjoy using our platform.','true')";

        mysqli_query($con,$q);
        
        $q = "INSERT INTO profiles (email , image_path)
        VALUES ('$email','BACK-END/UPLOADS/PROFILE/default_profile.png')";

        mysqli_query($con, $q);
        
    }

$array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);

$json_data = json_encode($array_data,JSON_PRETTY_PRINT);

echo $json_data;

?>