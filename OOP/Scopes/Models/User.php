<?php
require_once('Database.php');
require_once('Validator.php');

class User extends Database {
    private $db;

    private $email;

    private $password;

    private $name;

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

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $firstLetter = strtoupper(substr($name, 0,1));
        $restOfStr = substr($name, 1);
        $this->name = $firstLetter . $restOfStr;
    }

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function register(string $email, string $password): string {

        if(!Validator::isValidEmail(trim($email))) {
            throw new InvalidArgumentException('Invalid email address format!');
        }

        if(!Validator::isValidPassword(mb_strlen($password))) {
            throw new InvalidArgumentException('Password cannot be less then 8 characters');
        }

        if (Validator::isEmailExist($email)) {
            throw new RuntimeException('Email already exists');
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

    public function findUserByEmail(string $email): array {
        try {
            $sql = "SELECT * FROM `users` WHERE email = :email";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user === false) {  
                throw new RuntimeException('No User Found with this Email Address.');  
            }

            return $user;
        } catch (PDOException $e) {
            throw new RuntimeException('Database Error while searching for user' . $e->getMessage());
        }
    }

    public function deleteUser(string $email): bool {
        try {
            $sql = "DELETE FROM  users WHERE email=:email LIMIT 1";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(':email', $email);

            if(!$stmt->execute()) {
                throw new RuntimeException('Error during deleting user');
            }
            if($stmt->rowCount() === 0) {
                throw new RuntimeException('User with the specified email does not exist');
            }
            return true;
        } catch (PDOException $pdoException) {
            throw new RuntimeException('Database Error: ' . $pdoException->getMessage());
        } catch (RuntimeException $runtimeException) {
            throw $runtimeException;
        }
    }

    public function updateUser(string $oldEmail, string $newEmail, string $newPassword): bool {
        try {
            if(!Validator::isValidEmail(trim($newEmail))) {
                throw new InvalidArgumentException('Invalid email address format!');
            }
    
            if(!Validator::isValidPassword(mb_strlen($newPassword))) {
                throw new InvalidArgumentException('Password cannot be less than 8 characters');
            }
    
            if ($newEmail !== $oldEmail && Validator::isEmailExist($newEmail)) {
                throw new RuntimeException('Email already exists');
            }
    
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
            $sql = "UPDATE `users` SET email = :newEmail, password = :hashedPassword WHERE email = :oldEmail LIMIT 1";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(':newEmail', $newEmail);
            $stmt->bindParam(':hashedPassword', $hashedPassword);
            $stmt->bindParam(':oldEmail', $oldEmail);
            $result = $stmt->execute();
    
            if (!$result) {
                throw new RuntimeException('Failed to update user information');
            }
    
            return true;
        } catch (PDOException $pdoException) {
            throw new RuntimeException('Database Error: ' . $pdoException->getMessage());
        } catch (RuntimeException $runtimeException) {
            throw $runtimeException;
        }
    }
}