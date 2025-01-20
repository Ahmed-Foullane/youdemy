<?php
require_once "crud.php";
require_once '../config/db.php';

class UserDAO extends Crud {
    protected $table = "users"; 
    private $conn;
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
        parent::__construct();
    }

    public function getPendingTeachers() {
        $query = "SELECT * FROM users WHERE role = 'teacher' AND status = 'pending'";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Fetch Error: " . $e->getMessage());
            return [];
        }
    }

    
    public function updateUserStatus($id, $status) {
        $data = [
            "id" => $id,
            "status" => $status
        ];
        return $this->update($data);
    }

    public function findById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Fetch Error: " . $e->getMessage());
            return null;
        }
    }
    
}
?>