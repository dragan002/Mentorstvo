<?php

function sabiranje($broj1, $broj2) {
    return $broj1 + $broj2;
}

function oduzimanje($broj1, $broj2) {
    return $broj1 - $broj2;
}

function hrana($iznos) {
    // Convert $iznos to a float to ensure it's treated as a number
    $iznos = floatval($iznos);

    // Perform calculations
    $uvecanIznos = $iznos + 50;
    $uvecanIznosPDV = $iznos + 100;

    // Return the appropriate value based on whether the checkbox is checked
    return isset($_GET['checkbox']) ? $uvecanIznosPDV : $uvecanIznos;
}


function uredjaj($iznos) {
    $uvecanIznos = $iznos + 350;
    $uvecanIznosPDV = $iznos + 450;
    return isset($_GET['checkbox']) ? $uvecanIznosPDV : $uvecanIznos;
}