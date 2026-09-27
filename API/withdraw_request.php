<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"),true);
    
    $email = $data["email"];
    $method = $data['method'];
    $upi_id = $data['upi_id'] ?? '';
    $account_holder = $data['account_holder'] ?? '';
    $bank_name = $data['bank_name'] ?? '';
    $account_number = $data['account_number'] ?? '';
    $ifsc = $data['ifsc'] ?? '';
    $amount = $data['amount'];

    $con = mysqli_connect("localhost","root","","smartbook");

    /*   Insert Record   */

    $q = "INSERT INTO withdrawal_request
    (email , method, upi_id, account_holder, bank_name, account_number, ifsc, amount,status)
    VALUES ('$email','$method', '$upi_id', '$account_holder', '$bank_name', '$account_number', '$ifsc', '$amount','Pending')";

    mysqli_query($con,$q);

    echo json_encode(["msg" => "Successfully."],JSON_PRETTY_PRINT);

?>