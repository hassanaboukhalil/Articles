<?php

require_once('../../connection/connection.php');
require_once('./users_migration.php');

$sql1 = "drop database articles_db";
$result1 = $db_connect->query($sql1);

$sql2 = "create database articles_db";
$result2 = $db_connect->query($sql2);

$db_connect->select_db("articles_db");

create_users_migrations($db_connect);
