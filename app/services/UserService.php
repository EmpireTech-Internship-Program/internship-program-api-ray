<?php

class UserService {

    private $repository;

    public function __construct(UserRepository $userRepository) {
        $this->repository = $userRepository;
    }

    public function getAll() {
        //
    }

    public function get($id) {
        //
    }

    public function create($data) {
        //
    }

    public function edit($data, $id) {
        //
    }

    public function delete($id) {
        //
    }
}