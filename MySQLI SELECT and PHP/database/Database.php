<?php

require_once('credentials.php');

class Database {
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("DATABASE FAILED: " . $e->getMessage());
        }
    }
    public function getConnection() {
        return $this->conn;
    }
}