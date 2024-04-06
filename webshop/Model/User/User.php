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
}