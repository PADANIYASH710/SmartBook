<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$data = json_decode(file_get_contents("php://input"),true);

$id = $data['id'];

if (empty($id)) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid request."
    ]);
    exit;
}

$con = mysqli_connect("localhost","root","","smartbook");

/*================================
        Get User Email
================================*/

$q = "SELECT email FROM support WHERE id = $id";

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
      VALUES ('$email','fa-solid fa-circle-check','Request Resolved','Your Help Center request has been resolved successfully.','true')";

mysqli_query($con,$q);


/*================================
        Delete Request
================================*/

$q = "delete from support where id = $id";

mysqli_query($con,$q);

echo json_encode(["msg" => "Well Done!!"],JSON_PRETTY_PRINT);

?>