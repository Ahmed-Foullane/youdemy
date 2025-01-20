<?php

require_once "../config/db.php";
require_once "../models/Utilisateur.php"; 

require_once "../utils/utils.php";

class Auth {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function register(string $role,string $name, string $email, string $password): bool {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users (role, name, email, password) VALUES (:role, :name, :email, :password)';
        $stmt = $this->conn->prepare($sql); 
        try {
            $stmt->execute([
                'role' => $role,
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Registration failed: " . $e->getMessage());
            return false;
        }
    }

    // public function login(string $email, string $password) {
    //     $sql = 'SELECT * FROM users WHERE email = :email';
    //     $stmt = $this->conn->prepare($sql); 
    //     $stmt->execute(['email' => $email]);
    //     $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return;
    //     if ($userData && password_verify($password, $userData['password'])) {
            
    //         $role = new Role(); 
    //         $role->setId($userData["role_id"]);
    //         $user = new Utilisateur();
    //         $user->setRole($role);
    //         $user->setId($userData['id']);
    //         $user->setName($userData['name']);
    //         $user->setEmail($userData['email']);
    //         $user->setPassword($userData['password']); 
    //         return $user;
    //     }

    //     return null;
    // }

    public function login($email, $password) {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
          if ($email == $user['email']) {
            return $user;
          } else {
            return false;
          }
        } else {
          return false;
        }
      }

    public function getUserByEmail(string $email) {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->conn->prepare($sql); 
        $stmt->execute(['email' => $email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            $user = new Utilisateur();
            $user->getRole($userData['role']);
            $user->setId($userData['id']);
            $user->setName($userData['name']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);
            return $user;
        }
        return null;
    }
}