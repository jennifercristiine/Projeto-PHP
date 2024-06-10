<?php
class User {
    private $db;
    private $conn;

    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->connect();
    }

    public function register($name, $email, $password) {
        // Prepare statement
        $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        return $stmt->execute();
    }

    public function login($email, $password) {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }
}
?>