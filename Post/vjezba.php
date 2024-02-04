<?php

// if($_SERVER["REQUEST_METHOD"] == "POST") {
//     !empty(trim($_POST['pin'])) && is_numeric($_POST['pin']) && strlen($_POST['pin']) >= 4 && strpos($_POST['pin'], ' ') === false ? $pin = $_POST['pin'] : die("Morate koristiti najmanje 4 broja da bi pin bio uspjesan, prazan prostor se ne racuna kao karakter");

//     echo "Vas pin: " . $pin . " Je uspjesno postavljen";
// } else {
//     exit();
// }


if (!empty(trim($_POST['pin'])) && is_numeric($_POST['pin']) && strlen($_POST['pin']) >= 4 && strlen($_POST['pin']) <=6  && strpos($_POST['pin'], ' ') === false) {
    $pin = $_POST['pin'];
    echo "Vas pin: $pin Je uspjesno postavljen";
} else {
    die("Uslovi: Pin mora da bude broj, <br> da ima najmanje 4 broja, a najvise 6");
}
