<?php

require_once('../database/Database.php');


class Registration extends Database {

    function emailValidation($email) {
        $errors = [];
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email address.';
        }
        return $errors;
    }
    
    function passwordValidation($password) {
        $errors = [];
        if (empty($password) || strlen($password) < 6 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
            $errors['password'] = 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.';
        }
        return $errors;
    }
    
    function confirmPasswordValidation($password, $confirmPassword) {
        $errors = [];
        if($password !== $confirmPassword) {
            $errors['confirmPassword'] = "Passwords do not match.";
        }
        return $errors;
    }

    public function registerUser() {
        if (isset($_POST['register'])) {
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

            $emailErrors = $this->emailValidation($email);
            $passwordErrors = $this->passwordValidation($password);
            $confirmPasswordErrors = $this->confirmPasswordValidation($password, $confirmPassword);

            $errors = array_merge($emailErrors, $passwordErrors, $confirmPasswordErrors);

            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
            } else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $this->createUser($email, $hashedPassword);
                header("Location: ../homework/index.php");
                exit(); 
            }
        }
    }

    public function createUser($email, $hashedPassword) {
        $this->conn = $this->getConnection();
        $sql = "INSERT INTO `korisnici` (`email`, `sifra`) VALUES (:email, :password)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

        $result = $stmt->execute();

        if (!$result) {
            die("Error with inserting data");
        } else {
            $_SESSION['registration_success'] = true;
            return true;
        }
    }
}



