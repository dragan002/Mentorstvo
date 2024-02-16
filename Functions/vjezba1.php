<?php

// function sum($num1, $num2) {
//     if(!is_numeric($num1) && !is_numeric($num2)) {
//         return "Both inputs must be numeric.";
//     } 
//     return $num1 + $num2;
// }

//vjezba 1 i 2

function sum(...$numbers) {
    foreach($numbers as $num) {
        if(!is_numeric($num)) {
            return "Input has to be numeric";
        } else if($num == 0) {
            return  "Zero is not a valid input for this operation.";
        }
    } 
    return array_sum($numbers);
}
echo sum(1,2,2,455,32.22);