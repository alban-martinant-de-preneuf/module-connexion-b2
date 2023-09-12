<?php

namespace App\Controller;

use App\Model\AuthModel;

class AuthController {

    public function register(string $login, string $firstname, string $lastname, string $password, string $password2) {
        $args = func_get_args();
        foreach ($args as &$arg) {
            if (empty($arg)) {
                header("HTTP/1.1 400 Empty field");
                die();
            }
            $arg = htmlspecialchars($arg);
        }
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/', $password)) {
            header("HTTP/1.1 400 Invalid password");
            die();
        }
        if ($password !== $password2) {
            header("HTTP/1.1 400 Passwords don't match");
            die();
        }
        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            header("HTTP/1.1 400 Invalid email");
            die();
        }
        $authModel = new AuthModel();
        if ($authModel->getUser($login)) {
            header("HTTP/1.1 400 Email already exists");
            die();
        }
        $password = password_hash($password, PASSWORD_DEFAULT);

        $authModel->register($login, $firstname, $lastname, $password);
    }

    public function login(string $login, string $password) {
        $args = func_get_args();
        foreach ($args as &$arg) {
            if (empty($arg)) {
                header("HTTP/1.1 400 Empty field");
                die();
            }
            $arg = htmlspecialchars($arg);
        }
        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            header("HTTP/1.1 400 Invalid email");
            die();
        }
        $authModel = new AuthModel();
        $user = $authModel->getUser($login);
        var_dump($user);
        if (!$user) {
            header("HTTP/1.1 400 Email doesn't exist");
            die();
        }
        if (!password_verify($password, $user->getPassword())) {
            header("HTTP/1.1 400 Invalid password");
            die();
        }
        $_SESSION['user'] = $user;
    }
}