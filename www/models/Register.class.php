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
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        return $this->firstname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname;
    }
}