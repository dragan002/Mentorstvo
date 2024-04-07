<?php

$userModel = new App\Model\User\User();
$userInstance = new App\Model\User\Validation();

if(isset($_POST['registration'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

    $userInstance->emailValidation($email);
    $userInstance->passwordValidation($password);

    $errors = $userInstance->getErrors();

    if($password !== $confirmPassword) {
        $passwordError[] = "Password do not match, try again";
    }

    if(empty($errors)) {
        $hashedPassword = password_hash(htmlspecialchars($password), PASSWORD_DEFAULT);

        $createdUser = $userModel->registerUser([
            'name' => $name, 
            'email' => $email, 
            'password' => $hashedPassword
        ]);
        
        if(!$createdUser) {
            die("Something went wrong while creating your account");
        } 

        $_SESSION['success_message'] = "Registration successful. You can now login.";
        
        header('Location: ../../index.php');
        exit();
    }
}
?>