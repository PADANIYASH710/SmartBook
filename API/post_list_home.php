<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);
    $category = $data['category'];

    if($category == 'education'){
        $category = 'Education';
    }

    if($category == 'news'){
        $category = 'News';
    }

    if($category == 'programming'){
        $category = 'Programming';
    }

    if($category == 'technology'){
        $category = 'Technology';
    }

    if($category == 'science'){
        $category = 'Science';
    }

    if($category == 'history'){
        $category = 'History';
    }

    if($category == 'general_knowledge'){
        $category = 'General Knowledge';
    }

    if($category == 'environment'){
        $category = 'Environment';
    }

    if($category == 'geography'){
        $category = 'Geography';
    }

    if($category == 'sports'){
        $category = 'Sports';
    }

    $con = mysqli_connect("localhost","root","","smartbook");

    if($category == 'all'){
        $q = "select id , cover_image , category , created_at , title , meta_description , view from posts where approval = 'true' ORDER BY id DESC LIMIT 8";    
    }
    else{
        $q = "select id , cover_image , category , created_at , title , meta_description , view from posts where category = '$category' and approval = 'true' ORDER BY id DESC";
    }

    $sql = mysqli_query($con ,$q);

    $data = mysqli_fetch_all($sql , MYSQLI_ASSOC);

    $output = json_encode($data ,JSON_PRETTY_PRINT);

    echo $output;

?>