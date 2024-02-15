<?php

$imena = ["Nikolina", "Natasa", "Dragan"];

foreach($imena as &$ime) {
    $ime = strtolower($ime);
}
var_dump($imena);