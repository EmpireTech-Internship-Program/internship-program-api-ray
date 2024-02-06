<?php

$loginController = new LoginController($userService);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_GET['action'] === 'login') {
        $requestData = json_decode(file_get_contents('php://input'), true);
        $username = $requestData['username'];
        $password = $requestData['password'];
        echo $loginController->login($username, $password);
    } elseif ($_GET['action'] === 'signup') {
        $requestData = json_decode(file_get_contents('php://input'), true);
        $username = $requestData['username'];
        $password = $requestData['password'];
        echo $loginController->signup($username, $password);
    } elseif ($_GET['action'] === 'logout') {
        echo $loginController->logout();
    } elseif ($_GET['action'] === 'authorize') {
        $token = $_POST['token'];
        echo $loginController->authorize($token);
    }
}
