<?php
namespace Project\Models;

use Project\Core\BaseSQL;

class Users
{
    public $id = null;
    public $userLogin;
    public $userRegister;

    /**
     * Users constructor.
     * @param Login $login
     */
    public function __construct()
    {
        //parent::__construct();
        //$this->register =  $register;
        //$this->login =  $login;
    }

    /**
     * @param Login $login
     */
    public function setLogin(Login $login): void
    {
        $this->userLogin = $login;
    }

    /**
     * @param Register $register
     */
    public function setRegister(Register $register): void
    {
        $this->userRegister = $register;
    }
}
