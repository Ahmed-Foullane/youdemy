<?php

require_once 'config.php';

class Database {
    private const DSN = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    private $conn;
    private static $instance;

    public function __construct() {
        try {
            $this->conn = new PDO(self::DSN, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn; 
    }
}