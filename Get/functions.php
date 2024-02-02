<?php

function sabiranje($broj1, $broj2) {
    return $broj1 + $broj2;
}

function oduzimanje($broj1, $broj2) {
    return $broj1 - $broj2;
}

function hrana($iznos) {
    $uvecanIznos = $iznos + 50;
    $uvecanIznosPDV = $iznos + 100;
    return isset($_GET['checkbox']) ? $uvecanIznosPDV : $uvecanIznos;
}

function uredjaj($iznos) {
    $uvecanIznos = $iznos + 350;
    $uvecanIznosPDV = $iznos + 450;
    return isset($_GET['checkbox']) ? $uvecanIznosPDV : $uvecanIznos;
}