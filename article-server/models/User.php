<?php

class User
{
    // public function __construct($db_connect, $full_name, $email, $password)
    // {
    //     parent::__construct($full_name, $email, $password);
    //     // $this->db_connect = $db_connect;
    // }
    // public function createUser($db_connect, $full_name, $email, $password){
    //     $this->db_connect = $db_connect;
    //     $user = new UserSkeleton($full_name, $email, $password);
    //     $query = $this->db_connect->prepare('insert into users(full_name, email, password) values (?, ?, ?)');
    //     $query->bind_param('sss' , $user->getFullName(), $user->getEmail(), $user->getPassword());
    // }

    // public static function getUser($db_connect, $email, $password)
    // {
    //     $user = new UserSkeleton($email, $password);
    //     // $user = $this;
    //     // $query = $db_connect->prepare('select * from users where email = ?');
    //     // $query->bind_param('sss', $user->getFullName(), $user->getEmail(), $user->getPassword());

    //     $this->setEmail($email);
    //     $this->setPassword($password);

    //     // $query = $this->db_connect->prepare("select * from users where email = ?");
    //     $query = $db_connect->prepare("select * from users where email = ?");
    //     $query->bind_param("s", $this->getEmail());
    //     $query->execute();

    //     $result = $query->get_result();
    //     $user = $result->fetch_assoc();

    //     if(hash('sha256', $this->getPassword()) === $user['password']){
    //         return $user;
    //     }
    //     return $user = null;

    // }





    // private $full_name;
    // private $email;
    // private $password;
    // private $db_connect;
    // public function __construct($db_connect, $full_name = null, $email = null, $password = null)
    // {
    //     $this->db_connect = $db_connect;
    //     $this->$full_name = $full_name;
    //     $this->email = $email;
    //     $this->password = $password;
    // }


    // public function getUser()
    // {
    //     $query = $this->db_connect->prepare("select * from users where email = ?");
    //     $query->bind_param("s", $this->email);
    //     $query->execute();

    //     $result = $query->get_result();
    //     $user = $result->fetch_assoc();
    //     return $user;
    // }


    // public static function getUser($db_connect, $email, $password)
    // {
    //     $query = $db_connect->prepare("SELECT id, first_name, email, pass FROM users WHERE email = ?");
    //     $query->bind_param("s", $email);
    //     $query->execute();

    //     $array = $query->get_result();

    //     $response = [];
    //     while ($user = $array->fetch_assoc()) {
    //         $response[] = $user;
    //     }

    //     $user = $response[0];



    //     return $user;
    // }


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
