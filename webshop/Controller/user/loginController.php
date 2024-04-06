<?php

$userModel = new App\Model\User\User();


$loginInput = $userModel->getLoginInput();
$userByEmail = $userModel->getUserByEmail($loginInput['email']);

var_dump($userByEmail);

