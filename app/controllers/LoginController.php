<?php

class LoginController {

    private $service;

    public function __construct(UserService $userService) {
        $this->service = $userService;
    }

    public function login($username, $password) {
        $user = $this->service->getUserByUsername($username);

        if($user && password_verify($password, $user->getPassword())) {
        header("Location: ../Banks/listing-banks/listing.html");
        exit();
    }
}
        
    public function signup($username, $password) {
        $newUser = new User();
        $newUser->setUsername($username); 
        $newUser->setpassword($password);
        
        $success = $this->service->createUser($newUser);
 
        if($success) {
         header("Location: ../Banks/listing-banks/listing.html");
         exit();
        } 
    }

   function logout() {
    header("Location: ../../login/login.html");
    exit();    
}

}