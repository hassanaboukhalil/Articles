<?php

require_once('../../connection/connection.php');
require_once('./users_migration.php');
require_once('./questions_migration.php');

$sql1 = "drop database articles_db";
$result1 = $db_connect->query($sql1);

$sql2 = "create database articles_db";
$result2 = $db_connect->query($sql2);

$db_connect->select_db("articles_db");

create_users_migration($db_connect);
create_questions_migration($db_connect);


$db_connect->close();
