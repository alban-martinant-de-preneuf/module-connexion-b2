<?php

use App\Controller\ViewController;
use App\Controller\AuthController;
use App\Controller\AdminController;
use App\Controller\UserController;

session_start();

require_once 'vendor/autoload.php';

$router = new AltoRouter();

$router->setBasePath('/module-connexion-b2');

$router->map('GET', '/', function () {
    $viewController = new ViewController();
    $viewController->getHome();
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

$router->map('GET', '/admin/users', function () {
    $adminController = new AdminController();
    $adminController->getAllUsers();
}, 'get_all_users');

$router->map('GET', '/admin', function () {
    $viewController = new ViewController();
    $viewController->getAdminPage();
}, 'admin');

$router->map('GET', '/profil', function () {
    $viewController = new ViewController();
    $viewController->getProfilPage();
}, 'profil');

$router->map('POST', '/profil', function () {
    $userController = new UserController();
    $userController->updateUser(
        $_POST['login'],
        $_POST['firstname'],
        $_POST['lastname']
    );
}, 'profil_update');

$router->map('POST', '/profil/pwd', function () {
    $userController = new UserController();
    $userController->updatePwd(
        $_POST['password'],
        $_POST['password2']
    );
}, 'profil_update_pwd');

$router->map('GET', '/logout', function () {
    session_destroy();
}, 'logout');

// match current request url
$match = $router->match();

// call closure or throw 404 status`
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
