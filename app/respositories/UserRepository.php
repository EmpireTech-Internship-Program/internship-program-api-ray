<?php

class UserRepository {

    private $model;
    private $pdo;

    public function __construct(User $model, PDO $pdo) {
        $this->model = $model;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM project.users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this->model));
    }

    public function get($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM project.users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(get_class($this->model));
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO project.users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':password', $data['password']);
        return $stmt->execute();
    }

    public function edit($data, $id) {
        $stmt = $this->pdo->prepare("UPDATE project.users SET username = :username, password = :password WHERE id = :id");
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM project.users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function userExists($username) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM project.users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}