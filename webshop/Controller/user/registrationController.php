<?php

$user = new App\Model\User\User();

if(isset($_POST['registration'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
}

?>