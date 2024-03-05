<?php

require_once('../../database/Database.php');
require_once('Validations.php');
require_once('../../database/Users.php');


class Registration extends Database {
    public function registerUser() {

        $this->conn = $this->getConnection();

        if(!isset($_POST['submit'])) {
            echo "Something went wrong with registration";
        } else {
            $user = [
                'email' => $_POST['email'],
                'password' => $password = password_hash($_POST['password'], PASSWORD_DEFAULT),
                'confirmPassword' => $_POST['confirmPassword']
            ];
            $userValidation = new Validation;
            $emailError = $userValidation->emailValidation($user['email']);
            $passwordError = $userValidation->passwordValidation($user['password']);

            if(!password_verify($user['confirmPassword'], $password)) {
                die("Password does not match");
            }

            $errors = array_merge($emailError, $passwordError);

            if(empty($errors)){
                $insertedUsers = new Users();
                $insertedUser = $insertedUsers->insertUser([
                    ':email' => $user['email'],  
                    ':sifra' => $user['password']
                ]);
        }
            (!$insertedUser) ? print implode("<br>", $errors) : header("Location: ../index.php?register=success"); 
        
        return ['user'=>$user,'errors'=>$errors]; 
    }
}
}