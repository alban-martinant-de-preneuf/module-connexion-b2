<?php

namespace App\Model;

class User
{

    private int $id;
    private string $login;
    private string $firstname;
    private string $lastname;
    private string $password;

    public function __construct(int $id, string $login, string $firstname, string $lastname, string $password)
    {
        $this->id = $id;
        $this->login = $login;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
