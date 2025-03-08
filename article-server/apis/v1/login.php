<?php
require("../../connection/connection.php");
require('../../models/User.php');
require('../../utils/functions.php');


if (!issets_post_data("email", "pass")) {
    http_response_code(400);
    echo json_encode([
        "message" => "email and password are required"
    ]);

    exit();
}

$email = $_POST["email"];
$password = $_POST["pass"];

try {
    // $user = (new User($db_connect, $email))->getUser();
    $message = '';
    $user = User::getUser($db_connect, $email, $password);

    if ($user && (hash('sha256', $password) == $user['pass'])) {
        $message = 'success';
    } else {
        $message = 'Wrong email or password';
        $user = null;
    }

    echo json_encode([
        $data = [
            'message' => $message,
            'user' => $user
        ]
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["message" => $e->getMessage()]);
}
