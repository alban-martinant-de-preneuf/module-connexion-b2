<?php

namespace App\Controller;

use App\Model\AuthModel;

class AuthController
{

    /**
     * Register a new user
     *
     * @param string $login
     * @param string $firstname
     * @param string $lastname
     * @param string $password
     * @param string $password2
     * @return void
     */
    public function register(string $login, string $firstname, string $lastname, string $password, string $password2): void
    {
        $args = func_get_args();
        foreach ($args as &$arg) {
            if (empty($arg)) {
                // header("HTTP/1.1 400 Empty field");
                echo 'Empty field';
                die();
            }
            $arg = htmlspecialchars($arg);
        }
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/', $password)) {
            // header("HTTP/1.1 400 Invalid password");
            echo 'Invalid password';
            die();
        }
        if ($password !== $password2) {
            // header("HTTP/1.1 400 Passwords don't match");
            echo 'Passwords don\'t match';
            die();
        }
        $authModel = new AuthModel();
        if ($authModel->getUser($login)) {
            // header("HTTP/1.1 400 Email already exists");
            echo 'Email already exists';
            die();
        }
        $password = password_hash($password, PASSWORD_DEFAULT);

        $authModel->register($login, $firstname, $lastname, $password);
    }

    /**
     * Login a user
     *
     * @param string $login
     * @param string $password
     * @return void
     */
    public function login(string $login, string $password): void
    {
        $args = func_get_args();
        foreach ($args as &$arg) {
            if (empty($arg)) {
                // header("HTTP/1.1 400 Empty field");
                echo 'Empty field';
                die();
            }
            $arg = htmlspecialchars($arg);
        }
        $authModel = new AuthModel();
        $user = $authModel->getUser($login);
        
        if (!$user) {
            // header("HTTP/1.1 400 Email doesn't exist");
            echo 'Email doesn\'t exist';
            die();
        }
        if (!password_verify($password, $user->getPassword())) {
            // header("HTTP/1.1 400 Invalid password");
            echo 'Invalid password';
            die();
        }
        $_SESSION['user'] = serialize($user);
    }
}
