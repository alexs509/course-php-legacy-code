<?php

namespace Project\Models;

class Register
{
    public $firstname;
    public $lastname;

    /**
     * Register constructor.
     * @param string $firstname
     * @param string $lastname
     */
    public function __construct(string $firstname, string $lastname)
    {
        $this->firstname = ucwords(strtolower(trim($firstname)));
        $this->lastname = strtoupper(trim($lastname));
    }

    /**
     * @return string
     */
    public function setFirstname(): string
    {
       return $this->firstname;
    }

    /**
     * @return string
     */
    public function setLastname(): string
    {
       return $this->lastname;
    }
}