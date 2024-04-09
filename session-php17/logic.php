<?php

if(!isset($_POST['name']) || empty($_POST['name'])) {
    die("Please enter your name");
}

$name = htmlspecialchars(strip_tags($_POST['name'])); // strip tags, used just for improving skills

header('Location: view.php');
exit();
