<?php
require("../../connection/connection.php");
require('../../models/User.php');
require('../../utils/functions.php');

if (!issets_post_data("full_name", "email", "pass")) {
    http_response_code(400);
    echo json_encode([
        "message" => "full name, email and password are required"
    ]);
    exit();
}

$full_name = $_POST["full_name"];
$email = $_POST["email"];
$pass = hash('sha256', $_POST["pass"]);

try {
    $user = User::createUser($db_connect, $full_name, $email, $pass);

    if ($user) {
        $message = 'success';
    } else {
        $message = 'Something went wrong try again';
        $user = null;
    }

    echo json_encode([
        [
            'message' => $message,
            'user' => $user
        ]
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["message" => $e->getMessage()]);
}
