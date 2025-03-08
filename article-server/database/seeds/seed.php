<?php

require_once('../../connection/connection.php');

$sql = "
    insert into users (full_name, email, pass) values
    ('Yousef', 'yousef@gmail.com', '" . hash('sha256', 'qwer1234') . "'),
    ('Mohammad', 'mhmd@gmail.com', '" . hash('sha256', 'qwer1234') . "')
";

$result = $db_connect->query($sql);

if (!$result) {
    die("Error occured during adding users to database: " . $db_connect->error);
}


$db_connect->close();
