<?php

require_once 'Models/User.php';

$databaseModel = Database::getInstance();
$userModel = new User($databaseModel);

try {
    $userModel->setEmail('draganvujic29@gmail.com');
    $userModel->setPassword('GandalfIsEverywhere');
    $newUser = $userModel->register($userModel->getEmail(), $userModel->getPassword());
    echo "User registered Successfully";
} catch(InvalidArgumentException $e) {
    echo "Invalid Argument " . $e->getMessage();
} catch(RuntimeException $e) {
    echo "Error: " . $e->getMessage();
}
