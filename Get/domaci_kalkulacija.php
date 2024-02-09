<?php
require_once("functions.php");

if($_SERVER["REQUEST_METHOD"] != "GET") {
    echo "Greska";
} else {
    $iznos = isset($_GET['iznos']) ? $_GET['iznos'] : "Niste upisali iznos";
    $proizvod = isset($_GET['proizvod']) ? $_GET['proizvod'] : "Niste odabrali proizvod";

    $rezultat = ($proizvod == 'hrana') ? hrana($iznos) : uredjaj($iznos);

    echo $rezultat;
}

// ($_SERVER["REQUEST_METHOD"] != "GET") ? die('greska') :

//     $iznos = isset($_GET['iznos']) ? $_GET['iznos'] : "Niste upisali iznos";
//     $proizvod = isset($_GET['proizvod']) ? $_GET['proizvod'] : "Niste odabrali proizvod";

//     $rezultat = ($proizvod == 'hrana') ? hrana($iznos) : uredjaj($iznos);

//     echo $rezultat;
