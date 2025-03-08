<?php
header("Access-Control-Allow-Origin: *"); //allow any origin.
header("Access-Control-Allow-Methods: POST, GET, DELETE");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: Content-Type");

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'articles_db';

$db_connect = new mysqli($host, $user, $pass, $db_name);

if ($db_connect->connect_error) {
    die('Unable to connect to the database: ' . $db_connect->connect_error);
}
