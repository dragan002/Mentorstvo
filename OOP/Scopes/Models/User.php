<?php
require_once('Database.php');

class User {
    private $db;

    private $email;

    private $password;

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function register(string $email, string $password): string {

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email address format!');
        }

        if(strlen($password) < 8 ) {
            throw new InvalidArgumentException('Password cannot be less then 8 characters');
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO `users` (email, password) VALUES (:email, :hashedPassword)";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':hashedPassword', $hashedPassword);
            $result = $stmt->execute();

            if (!$result) { 
                throw new RuntimeException('Failed to insert the user into the database'); 
            }

            return 'Registratin Successfully';
        } catch (PDOException $e) {
            throw new RuntimeException('Database Error ' . $e->getMessage());
        }
    }
}
