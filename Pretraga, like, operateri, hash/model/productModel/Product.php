<?php
require_once('../model/database/Database.php');

$database = new Database();
$conn = $database->getConnection(); 

class Product {
    protected $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    
}