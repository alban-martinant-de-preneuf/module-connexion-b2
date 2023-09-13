<?php

namespace App\Controller;

use App\Model\AdminModel;

class AdminController
{
    /**
     * Check if user is admin to instantiate AdminController
     */
    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            if ($user->getLogin() === 'admiN1337$') {
                return $this;
            }
        }
    }

    /**
     * Get all users from database in JSON format
     *
     * @return void
     */
    public function getAllUsers(): void
    {
        $adminModel = new AdminModel();
        echo json_encode($adminModel->getAllUsers());
    }
}
