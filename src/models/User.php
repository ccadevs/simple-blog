<?php

class User {
    private $conn;
    private $table = 'users';

    public $id;
    public $email;
    public $username;
    public $password;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function findUserByEmail() {
        $query = "SELECT id, username, password FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function findUserById($id) {
        $query = "SELECT id, username, email FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function updateUser() {
        $query = "UPDATE " . $this->table . " SET username = :username, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    public function updatePassword($newPassword) {
        $query = "UPDATE " . $this->table . " SET password = :password WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    public function verifyPassword($currentPassword) {
        $query = "SELECT password FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return password_verify($currentPassword, $user['password']);
    }

    public function readAll() {
        $query = "SELECT id, username, email, created_at FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}

?>