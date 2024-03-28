<?php
require_once 'dbCredentials.php';

class Database {
    private $conn;
    const DB_SERVER = 'localhost';
    const DB_USERNAME =  'root';
    const DB_PASSWORD = '';
    const DB_DATABASE = 'web_shop';

    public function __construct() {
        try {
            $dsn = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_DATABASE;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->conn = new PDO($dsn, self::DB_USERNAME, self::DB_PASSWORD, $options);
        } catch(PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        }
    }
}

$conn = new Database();
var_dump($conn);
?>
