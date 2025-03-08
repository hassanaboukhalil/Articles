<?php

class UserSkeleton
{
    private $full_name;
    private $email;
    private $password;
    public function __construct($full_name, $email, $password)
    {
        $this->full_name = $full_name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getFullName()
    {
        return $this->full_name;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        return $this->password = $password;
    }
}
