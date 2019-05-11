<?php

namespace Project\Models;

class Login
{
    public $role = 1;
    public $status = 0;
    public $email;
    public $pwd;

    public function __construct(string $email, string $pwd)
    {
        $this->email = $email;
        $this->pwd = password_hash($pwd,PASSWORD_BCRYPT);
    }

    public function setRole() : int
    {
        return $this->role;
    }

    public function setStatus() : int
    {
        return $this->status;
    }

    public function setEmail() : string
    {
        return $this->email;
    }

    public function setPwd() : string
    {
        return $this->pwd;
    }

}