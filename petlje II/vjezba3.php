<?php 

$numbers = [2, 4, 3, 5];

// foreach( $numbers as &$number ) {
//     $number = $number * $number;
// }


$numbers = array_map(function($number) {
    return pow($number, 2);
}, $numbers);

var_dump($numbers);