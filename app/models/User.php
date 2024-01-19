<?php

class User {

    private $username;
    private $password;

    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $this->hashPassword($password);
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    private function getPassword() {
        return $this->password;
    }

    protected function setPassword($password) {
        $this->password = $this->hashPassword($password);
    }

    private function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}