<?php
require_once 'Models/Database.php';

class Validator extends Database {
    private static $db;

    public static function setDatabase(Database $db): void {
        self::$db = $db;
    } 

    public static function isValidEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function isValidPassword(string $password) :bool{
        return (strlen($password) < 8);
    }

    public static function isEmailExist(string $email): bool {
        if(!self::$db) {
            throw new RuntimeException("No database connection");
        }

        $sql =  "SELECT COUNT(*) FROM users WHERE email=:email";
        $stmt = self::$db->getConnection()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        return ($count > 0);
    }   
}