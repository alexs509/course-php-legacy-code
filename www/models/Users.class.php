<?php
namespace Project\Models;

use Project\Core\BaseSQL;


class Users extends BaseSQL
{
    public $id = null;
    public $register;
    public $login;

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



}
