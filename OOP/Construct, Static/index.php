<?php

require_once('models/User.php');
require_once('models/Database.php');

$draganUser = new User('dragan@gmail.com', '23242');
$draganUser->save();

var_dump($draganUser) . "<br>";

echo "<hr> Exercise 2";

