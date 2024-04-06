<?php

namespace App\Model\User;

use App\Model\Database\Database;
use PDO;
class User extends Database {

    const  TABLE_NAME = 'users';
    public function registerUser(array $user): bool {
        try {
            $sql = "INSERT INTO " . self::TABLE_NAME . "  (`name`, `email`, `password`) VALUES (:name, :email, :password)";
            
            $stmt = $this->getConnection()->prepare($sql);
            
            $stmt->bindParam(':name', $user['name'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $user['email'], PDO::PARAM_STR);
            $stmt->bindParam('password', $user['password'], PDO::PARAM_STR);

            $result = $stmt->execute();

            (!$result) ? die('Failed  to create user') : '';
            return true;
            
        } catch (\PDOException $e) {
            die("Error while trying to registrate a user " . $e->getMessage());
        }
    }

    public function getUserByEmail(string $email): ?array {
        try {
            $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE  email=:email";
            
            $stmt =  $this->getConnection()->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            (!$result) ? die("No user found with this email") : '';

            return $result;
        } catch  (\PDOException $e) {
            die("Erro while getting the user by email" . $e->getMessage());
        }
    }

    public function getLoginInput(): ?array {
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            return null;
        }
            return [
            'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            'password' => $_POST['password']
        ];
    }
    
}
// array(2) { ["name"]=> string(0) "" ["password"]=> NULL }