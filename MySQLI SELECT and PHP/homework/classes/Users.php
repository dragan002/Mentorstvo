<?php 
require_once('../database/Database.php');

class Users extends Database {

    public function createUser($email, $password) {
        $this->conn = $this->getConnection();
        $sql = ("INSERT INTO `korisnici` (`email`, `sifra`) VALUES (:email, :password)");

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
        $result = $stmt->execute();

        if (!$result) {
            die("error with inserting data");
        } else {
            return true;
        }
    }
}