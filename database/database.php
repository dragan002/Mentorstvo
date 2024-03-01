<?php
require('db_credentials.php'); // Database credentials


function dbConnect() {
    try {
        $conn = new PDO('mysql:host=' . DB_SERVER . '; dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("DATABASE FAILED: " . $e->getMessage());
    }
}


