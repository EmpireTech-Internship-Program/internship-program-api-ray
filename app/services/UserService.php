<?php

class UserService {

    private $repository;

    public function __construct(UserRepository $userRepository) {
        $this->repository = $userRepository;
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function get($id) {
        return $this->repository->get($id);
    }

    public function create($data) {
        return $this->repository->create([
            'username' => $data['username'],
            'password' => $data['password'],
        ]);
    }

    public function edit($data, $id) {
        return $this->repository->edit([
            'username' => $data['username'],
            'password' => $data['password'],
        ], $id);
    }

    public function delete($id) {
        return $this->repository->delete($id);
    }
}