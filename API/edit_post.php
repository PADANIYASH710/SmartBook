<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);

    $id =  (int)$data['id'];

    $title = $data['title'];

    $content = $data['content'];

    $cover_Image = $data['cover_image'];

    $category = $data['category'];

    $meta_description = $data['meta_description'];

    $con = mysqli_connect("localhost","root","","smartbook");

    $q = "update posts set title = '$title', content = '$content', cover_image = '$cover_Image', category = '$category', meta_description = '$meta_description' , approval = 'false' where id = $id";

    mysqli_query($con,$q);

    echo json_encode(["msg" => "Updated successfully!"],JSON_PRETTY_PRINT); 

?>