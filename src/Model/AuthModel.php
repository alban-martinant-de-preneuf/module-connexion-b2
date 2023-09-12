<?php

namespace App\Model;

class AuthModel {

    public function getUser(string $login)
    {
        $db = DbConnection::getDb();
        $query = $db->prepare('SELECT * FROM user WHERE login = :login');
        $query->bindParam(':login', $login);
        $query->execute();
        $data = $query->fetch();
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
        $query = $db->prepare('INSERT INTO user (login, firstname, lastname, password) VALUES (:login, :firstname, :lastname, :password)');
        $query->bindParam(':login', $login);
        $query->bindParam(':firstname', $firstname);
        $query->bindParam(':lastname', $lastname);
        $query->bindParam(':password', $password);
        if ($query->execute()) {
            header("HTTP/1.1 201 Created");
        } else {
            header("HTTP/1.1 500 Internal Server Error");
        }
    }
}

// sdf56ergM!dz