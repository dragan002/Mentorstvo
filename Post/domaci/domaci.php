<?php 

$imena = ['Gavrilo', 'Lazar', 'Ivana', 'Nina', 'Natasa', 'Ana'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    !empty(trim($_POST['ime'])) ? $ime = $_POST['ime'] : die("Niste unijeli ime");

    $found = false;
    foreach ($imena as $caseIme) {  
        if (strcasecmp($ime, $caseIme) === 0) {
            $found = true;
        }
    }

    if (!$found) {
        echo 'Ovo ime ne postoji u listu';
        exit();
    } else {
        echo "Bravo";
    }
}
?>
