<?php

require_once 'Models/User.php';

$databaseModel = Database::getInstance();
$userModel = new User($databaseModel);

$dragan = $userModel->register('novi@gmail.com', '121');