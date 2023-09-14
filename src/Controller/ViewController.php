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
        if (!isset($_SESSION['user'])) {
            // header('HTTP/1.1 403 Forbidden');
            header('location: /module-connexion-b2/');
        } else {
            $user = unserialize($_SESSION['user']);
            if ($user->getLogin() === 'admiN1337$') {
                require_once 'src/View/admin.php';
            } else {
                // header('HTTP/1.1 401 Unauthorized');
                header('location: /module-connexion-b2/');
            }
        }
    }

    public function getProfilPage()
    {
        if (!isset($_SESSION['user'])) {
            // header('HTTP/1.1 403 Forbidden');
            header('location: /module-connexion-b2/');
        } else {
            require_once 'src/View/profil.php';
        }
    }
}
