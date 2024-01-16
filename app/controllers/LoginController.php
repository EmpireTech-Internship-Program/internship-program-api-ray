<?php

class LoginController {

    private $service;

    public function __construct(UserService $userService) {
        $this->service = $userService;
    }

    public function login() {
        //
    }

    public function signup() {
        //
    }
}