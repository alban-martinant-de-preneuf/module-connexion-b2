<?php

namespace App\Controller;

class HomeController
{
    public function getHome()
    {
        require_once 'src/View/home.php';
    }
}
