<?php

class UserService {

    private $userRepository;

    public function __construct($userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getAll() {
        return $this->userRepository->getAll();
    }

    public function get($userId) {
        return $this->userRepository->get($userId);
    }

    public function create($username, $password) {
        return $this->userRepository->create($username, $password);
    }

    public function edit($userId, $username, $password) {
        return $this->userRepository->edit($userId, $username, $password);
    }

    public function delete($userId) {
        return $this->userRepository->delete($userId);
    }

    public function authenticateUser($username, $password) {
        $user = $this->userRepository->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            return new User($user['id'], $user['username'], $user['password']);
        } else {
            return null;
        }
    }

    public function createUser($username, $password) {
        return $this->userRepository->createUser($username, $password);
    }
}
