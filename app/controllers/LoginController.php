<?php

class LoginController {

    private $userService;

    public function __construct($userService) {
        $this->userService = $userService;
    }

    public function login($username, $password) {
        return $this->userService->authenticateUser($username, $password);
    }

    public function signup($username, $password) {
        return $this->userService->createUser($username, $password);
    }

    public function logout() {
        return "Logout bem-sucedido.";
    }
}