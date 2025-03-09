<?php

class Question
{
    public static function createQuestion($db_connect, $user_id, $question, $answer)
    {
        $query = $db_connect->prepare("insert into questions(user_id, question, answer) values (?, ?, ?)");
        $query->bind_param("iss", $user_id, $question, $answer);
        $query->execute();

        if ($query->affected_rows > 0) {
            $question = [
                "question_id" => $db_connect->insert_id,
                "user_id" => $user_id,
                "question" => $question,
                "answer" => $answer
            ];
            return $question;
        } else {
            throw new Exception("Failed to create FAQ.");
        }
    }
    public static function getQuestions($db_connect)
    {
        $query = $db_connect->prepare("SELECT * FROM questions");
        $query->execute();

        $result = $query->get_result();

        $questions = [];
        while ($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }

        return $questions;
    }
}
