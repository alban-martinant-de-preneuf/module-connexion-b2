<?php

namespace App\Controller;

use App\Model\User;

class ViewController
{
    public function getHome()
    {
        require_once 'src/View/home.php';
    }

    public function getAdminPage()
    {
        // if (isset($_SESSION['user'])) {
        //     var_dump($_SESSION['user']);
        //     if ($_SESSION['user']->getLogin() === 'admiN1337$') {
                require_once 'src/View/admin.php';
            // } else {
            //     header('location: /module-connexion-b2/');
            // }
        // }
    }

    // public function getUsersTable()
    // {
    //     $adminController = new AdminController();
    //     $users = $adminController->getAllUsers();
    //     var_dump($users);
    //     require_once 'src/View/usersTable.php';
    // }
}
