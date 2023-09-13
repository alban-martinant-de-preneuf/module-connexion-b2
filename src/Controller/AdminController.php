<?php

namespace App\Controller;

use App\Model\AdminModel;

class AdminController
{

    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            if ($user->getLogin() === 'admiN1337$') {
                return $this;
            }
        }
    }

    public function getAllUsers()
    {
        $adminModel = new AdminModel();
        echo json_encode($adminModel->getAllUsers());
    }
}
