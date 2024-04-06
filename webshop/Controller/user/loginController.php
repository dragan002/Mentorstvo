<?php

$userModel = new App\Model\User\User();

$loginInput = $userModel->getLoginInput();
$userFromDb = $userModel->getUserByEmail($loginInput['email']);

// Directly retrieve the password if getUserByEmail returns only one user
$passwordFromDb = isset($userFromDb[0]) ? $userFromDb[0]['password'] : null;

if(!password_verify($loginInput['password'], $passwordFromDb)) {
    echo 'Incorrect password, try again';
}

$_SESSION['login_success'] = "YOu are in";
header('Location: ../../index.php');
exit();


?>
