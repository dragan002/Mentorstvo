<?php
require_once 'dbCredentials.php';
class Database {
    private $conn;

    public function __construct() {
        try {
            $dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->conn = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
        } catch(PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        }
    }
}