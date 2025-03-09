<?php
require("../../connection/connection.php");
require('../../models/Question.php');
require('../../utils/functions.php');

if (!issets_post_data("id", "question", "answer")) {
    http_response_code(400);
    echo json_encode([
        "message" => "question and answer are required"
    ]);
    exit();
}

$user_id = $_POST["id"];
$question = $_POST["question"];
$answer = $_POST["answer"];

try {
    $question = Question::createQuestion($db_connect, $user_id, $question, $answer);

    if ($question) {
        $message = 'success';
    } else {
        $message = 'Something went wrong try again';
        $question = null;
    }

    echo json_encode([
        [
            'message' => $message,
            'question' => $question
        ]
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["message" => $e->getMessage()]);
}
