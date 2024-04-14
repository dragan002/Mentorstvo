<?php

class Database {
    private $conn;
    const DB_SERVER = 'localhost';
    const DB_USERNAME =  'root';
    const DB_PASSWORD = '';
    const DB_DATABASE = 'web_shop';

    private function __construct() {
        $dsn = "mysql:host=". self::DB_SERVER .";dbname=". self::DB_DATABASE .";charset=utf8";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->conn = new PDO($dsn, self::DB_USERNAME, self::DB_PASSWORD, $options);
    }

    public static function getInstance() {
        static $instance = null;
        if ($instance === null) {
            $instance = new self();
        }
        return $instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}

$database = Database::getInstance();
$conn = $database->getConnection();

if($conn) {
    echo 'Connected!';
}
