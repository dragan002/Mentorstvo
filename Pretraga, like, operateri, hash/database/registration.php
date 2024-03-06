<?php
require_once('Database.php');

$database = new Database();
$conn = $database->getConnection(); 

if(!isset($_POST['email']) && empty($_POST['email'])) {
    die("YOu don't send email");
}

if(!isset($_POST['password']) && empty($_POST['password'])) {
    die("YOu dont send password");
}

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

class Registration extends Database{
    
    public function createUser($email, $password) {
        $sql = "INSERT INTO `korisnici` (`email`, `sifra`) VALUES ($email, $password)";
    }

    public function checkIfEmailExist( $email ) {
        try {
            $this->conn = $this->getConnection();

            $sql = "SELECT * FROM `korisnici` WHERE `email` = :email";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                throw new Exception("Email already Exist in database");
            }

            return $result = $stmt->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}


