<?php
    
//     if($_SERVER["REQUEST_METHOD"] == "POST") {
//     empty($_POST['ime']) ? die("Ime nije upisano")  : $ime = $_POST['ime']; 
//     empty($_POST['lozinka']) ? die("Lozinka nije upisana") : $lozinka = $_POST['lozinka'];       
// }

// echo ($_SERVER['REQUEST_METHOD'] == "POST") ?
//     ((empty(trim($_POST['ime'])) && empty(trim($_POST['lozinka']))) ? "Ime i lozinka nisu uneseni" :
//         (empty(trim($_POST['ime'])) ? "Ime nije uneseno" :
//             (empty(trim($_POST['lozinka'])) ? "Lozinka nije unesena" : "Reg si"))) :
//     "";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(empty(trim($_POST['ime'])) && empty(trim($_POST['lozinka']))) {
        die("Ime i Lozinka nisu uneseni");
    } else if(empty(trim($_POST['ime']))) {
        die("ime nije uneseno");
    } else if(empty(trim($_POST['lozinka']))) {
        die("lozinka nije unesena");
    } else {
        echo "Registrovan si";
    }
} 
    