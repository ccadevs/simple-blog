<?php

    session_start();

    require_once '../config/Database.php';
    require_once '../src/models/User.php';

    class AuthController {
        private $db;
        private $user;

        public function __construct() {
            $database = new Database();
            $this->db = $database->connect();
            $this->user = new User($this->db);
        }

        public function login($email, $password) {
            $this->user->email = $email;
            $user = $this->user->findUserByEmail();

            if ($user) {
                if (password_verify($password, $user->password)) {
                    $_SESSION['user_id'] = $user->id;
                    $_SESSION['username'] = $user->username;
                    header("Location: dashboard.php");
                    exit();
                }
            }
        }

        public function logout() {
            session_destroy();
            header("Location: ./");
            exit();
        }
    }

?>
