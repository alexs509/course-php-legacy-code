<?php

namespace Project\Models;

class Login
{
    public $role = 1;
    public $status = 0;
    public $email;
    public $pwd;

    /**
     * Login constructor.
     * @param string $email
     * @param string $pwd
     */
    public function __construct(string $email, string $pwd)
    {
        $this->email = $email;
        $this->pwd = password_hash($pwd,PASSWORD_BCRYPT);
    }

    /**
     * @return int
     */
    public function setRole() : int
    {
        return $this->role;
    }

    /**
     * @return int
     */
    public function setStatus() : int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function setEmail() : string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function setPwd() : string
    {
        return $this->pwd;
    }

}