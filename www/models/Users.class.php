<?php
namespace Project\Models;

use Project\Core\BaseSQL;

class Users extends BaseSQL
{
    public $id = null;
    public $register;
    public $login;
    //public $firstname;
    //public $lastname;

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

    public function setLogin(Login $login): void
    {
        $this->login = $login;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = ucwords(strtolower(trim($firstname)));
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = strtoupper(trim($lastname));
    }

}
