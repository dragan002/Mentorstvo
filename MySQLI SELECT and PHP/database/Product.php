<?php
require_once('Database.php');

class Product extends Database {
    const TABLE_NAME = 'proizvodi';

    public function getAllProduct() {
        try {
            $this->conn = $this->getConnection();

            $stmt =  $this->conn->query("SELECT * FROM " . self::TABLE_NAME);
            $stmt->execute();

            if($stmt !== false) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } 
           
        } catch (PDOException $e) {
            throw new Exception("Error retrieving products: " . $e->getMessage());
        }
    }
}