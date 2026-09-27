<?php
    
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);

    $id =  (int)$data['id'];

    $con = mysqli_connect("localhost","root","","smartbook");

    $q = "delete from posts where id = $id";

    mysqli_query($con,$q);

    echo json_encode(["msg" => "Post deleted successfully."],JSON_PRETTY_PRINT);

?>