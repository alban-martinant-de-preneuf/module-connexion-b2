<?php

namespace App\Model;

class AuthModel
{

    public function getUser(string $login)
    {
        $db = DbConnection::getDb();
        $sqlQuery = 'SELECT * FROM user WHERE login = :login';
        $statement = $db->prepare($sqlQuery);
        $statement->bindParam(':login', $login);
        $statement->execute();
        $data = $statement->fetch();
        var_dump($data);
        if ($data) {
            return new User($data['id'], $data['login'], $data['firstname'], $data['lastname'], $data['password']);
        } else {
            return null;
        }
    }

    public function register(string $login, string $firstname, string $lastname, string $password)
    {
        $db = DbConnection::getDb();
        $sqlQuery = ('INSERT INTO user (login, firstname, lastname, password) 
            VALUES (:login, :firstname, :lastname, :password)'
        );
        $statement = $db->prepare($sqlQuery);
        $statement->bindParam(':login', $login);
        $statement->bindParam(':firstname', $firstname);
        $statement->bindParam(':lastname', $lastname);
        $statement->bindParam(':password', $password);
        if ($statement->execute()) {
            header("HTTP/1.1 201 Created");
        } else {
            header("HTTP/1.1 500 Internal Server Error");
        }
    }
}

// sdf56ergM!dz