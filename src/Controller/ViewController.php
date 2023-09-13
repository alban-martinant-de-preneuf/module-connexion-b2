<?php

namespace App\Controller;

class ViewController
{
    public function getHome()
    {
        require_once 'src/View/home.php';
    }

    public function getAdminPage()
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            if ($user->getLogin() === 'admiN1337$') {
                require_once 'src/View/admin.php';
            } else {
                header('location: /module-connexion-b2/');
            }
        }
    }
}
