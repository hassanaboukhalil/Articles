<?php

class Question
{
    public static function getQuestions($db_connect)
    {
        $query = $db_connect->prepare("SELECT * FROM Questions");
        $query->execute();

        $result = $query->get_result();

        $questions = [];
        while ($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }

        return $questions;
    }
}
