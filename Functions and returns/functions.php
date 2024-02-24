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
        return ($total / 100) * $discount;
    } catch(InvalidArgumentException $e){
        echo 'Error: ',  $e->getMessage(), "\n";
    }
}

// Exercise 3
function discountForEachElement(...$array) {
    $discounts = [];

    foreach ($array as $number) {
        if (!is_numeric($number)) {
            die('Array can only contain numbers.');
        }

        $discount = ($number / 100) * 10;
        $formattedNumber = number_format($number, 2);
        $formattedDiscount = number_format($discount, 2);
        $discounts[] = "Typed price is: \${$formattedNumber} - Discount is: \${$formattedDiscount}";
    }

    $resultString = implode('<br>', $discounts);
    $totalDiscount = array_sum($array) * 0.1;
    $totalDiscountFormatted = number_format($totalDiscount, 2);

    return "Discounts for each number typed in the array (10%): <br>{$resultString}.<br>Total discount: \${$totalDiscountFormatted}";
}



