<?php

require_once 'Models/User.php';

$databaseModel = Database::getInstance();
$userModel = new User($databaseModel);
Validator::setDatabase($databaseModel);


try {
    $userModel->setEmail('draganvujic29@gmai.com');
    $userModel->setPassword('GandalfIsEverywhere');
    $newUser = $userModel->register($userModel->getEmail(), $userModel->getPassword());
    echo "User registered Successfully";
} catch(InvalidArgumentException $e) {
    echo "Invalid Argument " . $e->getMessage();
} catch(RuntimeException $e) {
    echo "Error: " . $e->getMessage();
}


$userModel->setName('frodo Bagins'); //exericise
echo "<hr>" . $userModel->getName() . "<hr>";

// $searchedUser = $userModel->findUserByEmail('draganvujic29@gmail.com');
// print_r($searchedUser);

// $deleteUser = $userModel->deleteUser('draganvujic29@gmail.com');
$updateUser = $userModel->updateUser('novi@gmail.com', 'valkira95@gmail.com', 'NewPassword12!');