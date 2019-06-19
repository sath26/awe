<?php
require_once 'database.php';

class Login {
    private $conn;

    // Constructor
    public function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    // Execute queries SQL
    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    // Insert
    public function insert($name, $email) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindparam(":username", $name);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":password", $email);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    // Redirect URL method
    public function redirect($url) {
        header("Location: $url");
    }
}
?>