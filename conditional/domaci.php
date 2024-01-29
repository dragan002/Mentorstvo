<?php
//domaci 1
$ime = "administrator";
$lozinka = "MojaSifraJeSigurna";

echo($ime == "Administrator" &&  $lozinka == "MojaSifraJeSigurna") ? "Dobrodosao Administratore" : "Greska";


echo "<hr>";

//domaci 2

$sati = date('H');

if($sati  >=5 && $sati <= 12) {
    echo "Jutro je, Jutro je";
} else if($sati >=12 && $sati <=20) {
    echo "Podne je";
} else {
    echo "noc je";
}
echo "<hr>";

echo($sati >= 5 && $sati <= 12) ? "Jutro je, jutro jee" :
    (($sati >= 12 && $sati <=20) ? "Podne je" : "Noc je");

