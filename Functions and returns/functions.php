<?php
// Exercise 1
function multiply($num1, $num2) {
    $result = $num1 * $num2;
    return $result;
}

function multiply2(...$numbers) {
    try {
        $result = 1;
        foreach ($numbers as $num) {
            if (!is_numeric($num)) {
                throw new InvalidArgumentException('All arguments must be numeric');
            }
            $result *= $num;
        }
        return $result;
    } catch (InvalidArgumentException $e) {
        echo 'Error: ',  $e->getMessage(), "\n";
    }
}

// Exercise 2
function calculateDiscountPrice($total, $discount) {
    try {
        if(!is_numeric($total)  || !is_numeric($discount)){
            throw new InvalidArgumentException("Both total and discount should be numbers");
        }
        $priceWithDiscount = ($total / 100) * $discount;
        return $priceWithDiscount;
    } catch(InvalidArgumentException $e){
        echo 'Error: ',  $e->getMessage(), "\n";
    }
}