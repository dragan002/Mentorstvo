<?php

require_once 'Database.php';

$database = new Database();
$conn = $database->getConnection();

if(isset($_GET['search'])) {
    $typedEmail = $_GET['search'];
    $user = new Users($conn);
    $emailFromDb = $user->searchEmail($typedEmail);

    if($typedEmail == $emailFromDb) {
        echo sprintf("You are looking email '%s' in the database and we found it", $typedEmail);
    } else {
        echo sprintf("'%s' is not in the database", $typedEmail);
    }
}

class Users {
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function searchEmail($email) {
        $sql = "SELECT * FROM `korisnici` WHERE `email` = :email";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($result as $row) {
            return $row['email'];
        }
    }
}