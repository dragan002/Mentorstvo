<?php
require_once('Database.php');

class User {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function register(string $email, string $password): bool {
        try {
            $sql = "INSERT INTO `users` (email, password) VALUES (:email, :password)";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $result = $stmt->execute();

            if (!$result) { 
                die("Failed to insert data into the database");
            }

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
