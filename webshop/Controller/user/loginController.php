<?php

if(session_status()  == PHP_SESSION_NONE) {
    session_start();
}

$userModel = new App\Model\User\User();
$loginInput = $userModel->getLoginInput();

if (isset($_POST['login'])) {
    $userFromDb = $userModel->getUserByEmail($loginInput['email']);
    
    if ($userFromDb && password_verify($loginInput['password'], $userFromDb[0]['password'])) {
        $_SESSION['id'] = $userFromDb[0]['id'];
        $_SESSION['login-success'] = "You are logged in ". $userFromDb[0]['name'];
        
        if ($userFromDb[0]['role'] == 'user') {
            header('Location: ../../index.php');
            exit();
        } 
        header('Location: ../../View/adminPanel/adminIndex.php');
            exit(); 
    } 
    $_SESSION['login-error'] = "Incorrect email or password";
}
?>
