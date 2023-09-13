<?php

namespace App\Model;

class User
{

    private ?int $id;
    private string $login;
    private string $firstname;
    private string $lastname;
    private string $password;

    /**
     * User constructor - create a new instance of User
     *
     * @param integer $id
     * @param string $login
     * @param string $firstname
     * @param string $lastname
     * @param string $password
     */
    public function __construct(int $id, string $login, string $firstname, string $lastname, string $password)
    {
        $this->id = $id;
        $this->login = $login;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->password = $password;
    }

    /**
     * get the value of id
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * get the value of login
     *
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * get the value of firstname
     *
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * get the value of lastname
     *
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * get the value of password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * set the value of login
     *
     * @param string $login
     * @return User
     */
    public function setLogin(string $login): User
    {
        $this->login = $login;
        return $this;
    }

    /**
     * set the value of firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname(string $firstname): User
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * set the value of lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname(string $lastname): User
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * set the value of password
     *
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }
}
