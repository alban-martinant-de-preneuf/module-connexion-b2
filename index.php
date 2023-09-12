<?php

session_start();

use App\Controller\HomeController;
use App\Controller\AuthController;


require_once 'vendor/autoload.php';

$router = new AltoRouter();

$router->setBasePath('/module-connexion-b2');

$router->map('GET', '/', function () {
    $homeController = new HomeController();
    $homeController->getHome();
}, 'home');

$router->map('POST', '/register', function () {
    $authController = new AuthController();
    $authController->register(
        $_POST['login'],
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['password'],
        $_POST['password2']
    );
}, 'sign_in');

$router->map('POST', '/login', function () {
    $authController = new AuthController();
    $authController->login(
        $_POST['login'],
        $_POST['password']
    );
}, 'login');

// match current request url
$match = $router->match();

// call closure or throw 404 status`
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
