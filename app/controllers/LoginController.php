<?php

class LoginController {

    private $service;

    public function __construct(UserService $userService) {
        $this->service = $userService;
    }

    public function login($username, $password) {
        $user = $this->service->getUserByUsername($username);
    
        if ($user && $this->verifyPassword($password, $user['password'])) {
            $this->redirectTo('../listing-banks/listing.html');
        } else {
            $this->redirectTo('../../login/login.html');
        }

        exit(); 
    }
    
    private function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }

    public function signup($username, $password, $name, $email, $documentNumber) {
        $success = $this->service->createUser($username, $password, $name, $email, $documentNumber);

        if ($success) {
            $this->redirectTo('../listing-banks/listing.html');
        } else {
            $this->redirectTo('../../login/login.html');
        }

        exit();
    }

    private function redirectTo($location) {
        header("Location: $location");
        exit();
    }

   function logout() {

        session_start();
        session_destroy();

        $this->redirectTo('../../login/login.html');
        exit();   
    }

}