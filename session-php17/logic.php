<?php

if(!isset($_POST['name']) || empty($_POST['name'])) {
    die("Please enter your name");
}

$name = htmlspecialchars(strip_tags($_POST['name'])); // strip tags, used just for improving skills

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['name'] = $name;

header('Location: index.php');
exit();
