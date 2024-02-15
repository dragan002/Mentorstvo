<?php

$osobe = [
    'Dragan' => [
        "prezime" => "Vujic",
        "godine" => 28
    ],

    'Natasa' => [
        "prezime" => "Tomic",
        "godine" => 38
    ]
    ];

    foreach($osobe as $ime => $osoba) {
        $godine = $osoba['godine'];
        echo "$ime ima $godine godina <br>";
    }