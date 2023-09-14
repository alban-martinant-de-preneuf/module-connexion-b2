<?php

namespace App\Controller;

class UserController {

    public function updateUser(string $login, string $firstname, string $lastname): void
    {
        $args = func_get_args();
        foreach ($args as &$arg) {
            if (empty($arg)) {
                // header("HTTP/1.1 400 Empty field");
                echo 'Il y a des champs vides !';
                die();
            }
            $arg = htmlspecialchars($arg);
        }
        $user = unserialize($_SESSION['user']);
        $user->setLogin($login);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $_SESSION['user'] = serialize($user);
        $user->updateUser();
    }

    public function updatePwd(string $password, string $password2): void
    {
        $args = func_get_args();
        foreach ($args as &$arg) {
            if (empty($arg)) {
                // header("HTTP/1.1 400 Empty field");
                echo 'Veuillez remplir tous les champs !';
                die();
            }
            $arg = htmlspecialchars($arg);
        }
        if ($password !== $password2) {
            // header("HTTP/1.1 400 Passwords don't match");
            echo 'Les mots de passe ne correspondent pas !';
            die();
        }
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/', $password)) {
            // header("HTTP/1.1 400 Invalid password");
            echo 'Le mot de passe doit contenir au moins 8 caractères dont une majuscule, une minuscule, un chiffre et un caractère spécial !';
            die();
        }
        $user = unserialize($_SESSION['user']);
        $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
        $_SESSION['user'] = serialize($user);
        $user->updateUserPwd();
    }
}