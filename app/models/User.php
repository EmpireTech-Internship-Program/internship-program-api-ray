<?php

class User {

    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->setPassword($password); 
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
}
