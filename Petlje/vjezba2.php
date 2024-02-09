<?php

$automobili = [
    'Audi' => 120003,
    'Bmw' => 10000,
    'Mercedes' => 9020
];

foreach($automobili as $auto => $cijena) {
    if($auto == 'Mercedes') {
        continue;
    }
    $cijenaFormat = number_format($cijena, 2, '.', '.');

    echo "Prodajem $auto, pocetna cijena je $cijenaFormat <br>";
}