<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);

    $id =  (int)$data['id'];
    $btn = $data['btn'];

    $con = mysqli_connect("localhost","root","","smartbook");

    /*================================
            Get User Email
    ================================*/

    $q = "SELECT email FROM withdrawal_request WHERE id = $id";

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

    if($btn == "Paid"){
        $icon = "fa-solid fa-indian-rupee-sign";
        $title = "Payment Successful";
        $description = "Your withdrawal request has been approved and the amount has been successfully paid.";
    }

    if($btn == "Rejected"){
        $icon = "fa-solid fa-circle-xmark";
        $title = "Withdrawal Rejected";
        $description = "Your withdrawal request has been rejected. Please check your withdrawal details and make sure your profile primary details are complete and correct before trying again.";
    }

    $q = "INSERT INTO notifications (email , icon ,title , description , unread)
        VALUES ('$email','$icon','$title','$description','true')";

    mysqli_query($con,$q);

    /*================================
            Change Status
    ================================*/

    $q = "update withdrawal_request set status = '$btn' where id = $id";

    mysqli_query($con,$q);

    echo json_encode(["msg" => "Withdrawal status updated successfully."],JSON_PRETTY_PRINT);

?>