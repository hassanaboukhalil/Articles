<?php
require("../../connection/connection.php");
require('../../models/Question.php');


try {
    $message = '';
    $questions = Question::getQuestions($db_connect);
    echo json_encode([
        'message' => 'success',
        'questions' => $questions
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["message" => $e->getMessage()]);
}
