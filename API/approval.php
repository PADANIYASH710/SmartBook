<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);
    
    $id = $data['id'];

    $con = mysqli_connect("localhost","root","","smartbook");

    /*================================
            Post Approval Update
    ================================*/

    $q = "update posts set approval = 'true' where id = $id";
    
    mysqli_query($con, $q);

    /*================================
            Get User Email
    ================================*/

    $q = "SELECT email FROM posts WHERE id = $id";

    $result = mysqli_query($con, $q);

    if (!$result || mysqli_num_rows($result) == 0) {

        echo json_encode([
            "status" => false,
            "msg" => "Request not found."
        ]);

        exit;
    }

    $row = mysqli_fetch_assoc($result);

    $email = $row['email'];

    /*================================
            Add Notification
    ================================*/

    $q = "INSERT INTO notifications (email , icon ,title , description , unread)
        VALUES ('$email','fa-solid fa-thumbs-up','Post Approved','Your post has been approved successfully and is now available on SmartBook.','true')";

    mysqli_query($con,$q);

    echo json_encode(["msg" => "Post approved successfully!"],JSON_PRETTY_PRINT);

?>