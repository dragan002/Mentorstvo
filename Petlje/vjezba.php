<?php

$automobili = [
    'Audi' => '120003e',
    'Bmw' => '10000e',
    'Mercedes' => '9020e'
];

foreach($automobili as $auto => $cijena) {
    echo "Prodajem $auto, pocetna cijena $cijena <br>";
}