<?php

namespace App\Model;

class User
{

    private ?int $id;
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

    public function getId(): int
    {
        return $this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setLogin(string $login): User
    {
        $this->login = $login;
        return $this;
    }

    public function setFirstname(string $firstname): User
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function setLastname(string $lastname): User
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }
}
