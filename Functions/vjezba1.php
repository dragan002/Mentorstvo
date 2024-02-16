<?php

// function sum($num1, $num2) {
//     if(!is_numeric($num1) && !is_numeric($num2)) {
//         return "Both inputs must be numeric.";
//     } 
//     return $num1 + $num2;
// }

function sum(...$numbers) {
    foreach($numbers as $num) {
        if(!is_numeric($num)) {
            return "Input has to be numeric";
        }
    } 
    return array_sum($numbers);
}
echo sum(1,2,3,455);