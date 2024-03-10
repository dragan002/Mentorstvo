<?php

class Users {
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function createUser($email, $password) {
        try {
            if($this->checkIfEmailExist($email)) {
                throw new Exception("This email is already in use.");
            }

            $sql = "INSERT INTO `korisnici` (`email`, `sifra`) VALUES(:email, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $result = $stmt->execute();

            if(!$result) {
                throw new Exception("Query  failed.");
             }
             return true;
         } catch (Exception $ex) {
             echo ("Error: " . $ex->getMessage());
        }
    }

    public function checkIfEmailExist($email) {
        try {
            $sql = "SELECT * FROM `korisnici` WHERE `email` = :email";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->rowCount() > 0;

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
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

    public function searchEmailByWord($email) {
        $sql = "SELECT * FROM `korisnici` WHERE `email` LIKE :email";

        $stmt = $this->conn->prepare($sql);
        $email = "%".$email."%";
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $foundWordsInEmail = [];
        foreach($result as $row) {
            $foundWordsInEmail[] = $row['email'];
        }
        return $foundWordsInEmail;
    }
}