<?php

function create_questions_migration($db_connect)
{
    $sql = "
        create table questions(
            id int(11) auto_increment primary key,
            user_id int(11) not null,
            question varchar(255) not null,
            answer varchar(255) not null,
            created_at timestamp default current_timestamp,
            foreign key (user_id) references users(id)
        )
    ";

    $result = $db_connect->query($sql);

    if (!$result) {
        die("Error occured during the created of the users table: " . $db_connect->error);
    }
}
