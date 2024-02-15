<?php

$automobili = [
    'Zastava' => [
        'model' => 'Yugo 55',
        'godiste' => 1995
    ],

    'Renault' => [
        'model' => 'Megane',
        'godiste' => 2014
    ],

    'Toyota' => [
        'model' => 'Raw4',
        'godiste' => 2021
    ]
];
$datum = date('Y');
foreach($automobili as $auto => $opis) {
    $godine = $datum - $opis['godiste'];
    $starostAutomobila = '';

    if($godine < 5) {
        $starostAutomobila = "novi auto";
    } else if($godine > 5 && $godine < 11) {
        $starostAutomobila = "noviji auto";
    } else if($godine > 10 && $godine < 20) {
        $starostAutomobila = "Stari auto";
    } else {
        $starostAutomobila = "Oldtimer";
        echo "$auto ima $godine i oldtimer je  <br>";
    }
    echo $opis['model'] . " je " . $starostAutomobila ."<br>";
}
// $date = date('Y');
// foreach($automobili as $auto => $opis) {
//     $godine = $date - $opis['godiste'];
//     if($godine < 5) {
//         echo "$auto je nova i ima $godine . <br>";
//     } else if ($godine > 5 && $godine < 11) {
//         echo "$auto je noviji i ima $godine <br>";
//     } else {
//         echo "$auto je oldtimer i ima $godine <br>";

//     }

// }