<?php

class UserRepository {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get($userId) {
        $sql = "SELECT * FROM users WHERE id = $userId";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function create($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
        return $this->conn->query($sql);
    }

    public function edit($userId, $username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET username = '$username', password = '$hashedPassword' WHERE id = $userId";
        return $this->conn->query($sql);
    }

    public function delete($userId) {
        $sql = "DELETE FROM users WHERE id = $userId";
        return $this->conn->query($sql);
    }
}
