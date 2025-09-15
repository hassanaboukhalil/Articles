<?php

class User
{
    public static function createUser($db_connect, $full_name, $email, $pass)
    {
        $query = $db_connect->prepare("insert into users(full_name, email, pass) values (?, ?, ?)");
        $query->bind_param("sss", $full_name, $email, $pass);
        $query->execute();

        if ($query->affected_rows > 0) {
            $user = [
                "id" => $db_connect->insert_id,
                "full_name" => $full_name,
                "email" => $email
            ];
            return $user;
        } else {
            throw new Exception("Failed to create user.");
        }
    }


    public static function getUser($db_connect, $email, $password)
    {
        $query = $db_connect->prepare("SELECT id, full_name, email, pass FROM users WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();

        $result = $query->get_result();
        $user = $result->fetch_assoc();
        return $user;
    }
}

// class User extends UserSkeleton
// {
//     private $db_connect;
//     public function __construct($db_connect, $email, $password = null, $full_name = null)
//     {
//         parent::__construct($email, $full_name, $password);
//         $this->db_connect = $db_connect;
//     }


//     public function createUser($full_name, $email, $pass)
//     {
//         // $this->db_connect = $db_connect;
//         $user = new UserSkeleton($email, $full_name, $pass);
//         $query = $this->db_connect->prepare("insert into users(full_name, email, pass) values (?, ?, ?)");
//         $query->bind_param("sss", $user->getFullName(), $user->getEmail(), $user->getPassword());
//         $query->execute();

//         if ($query->affected_rows > 0) {
//             return [
//                 "id" => $this->db_connect->insert_id,
//                 "full_name" => $user->getFullName(),
//                 "email" => $user->getEmail()
//             ];;
//         } else {
//             throw new Exception("Failed to create user.");
//         }
//     }


//     public function getUser($email)
//     {
//         // $this->db_connect = $db_connect;
//         // $email = parent::getEmail();
//         $query = $this->db_connect->prepare("SELECT id, full_name, email, pass FROM users WHERE email = ?");
//         $query->bind_param("s", $email);
//         $query->execute();

//         $result = $query->get_result();
//         $user = $result->fetch_assoc();
//         return $user;
//     }
// }
