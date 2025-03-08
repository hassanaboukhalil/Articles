<?php

function create_users_migrations($db_connect)
{
    $sql = "
        create table users(
            id int(11) auto_increment primary key,
            full_name varchar(255) not null,
            email varchar(255) not null,
            pass varchar(255) not null,
            created_at timestamp default current_timestamp
        )
    ";

    $result = $db_connect->query($sql);

    if (!$result) {
        die("Error occured during the created of the users table: " . $db_connect->error);
    }


    $db_connect->close();
}
