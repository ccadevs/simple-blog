<?php

    class Category {
        private $conn;
        private $table = 'categories';

        public $id;
        public $name;
        public $created_at;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function create() {
            $query = "INSERT INTO " . $this->table . " SET name = :name";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $this->name);
            return $stmt->execute();
        }

        public function readAll() {
            $query = "SELECT id, name, created_at FROM " . $this->table . " ORDER BY created_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function update() {
            $query = "UPDATE " . $this->table . " SET name = :name WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':id', $this->id);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function delete() {
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $this->id);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
    }

?>