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

        $discount = ($number / 100) * 0.1;

        $formattedNumber = number_format($number, 2);
        $formattedDiscount = number_format($discount, 2);

        $discounts[] = "Typed price is: \${$formattedNumber} - Discount is: \${$formattedDiscount}";
    }

    $resultString = implode('<br>', $discounts);
    $totalDiscount = array_sum($array) * 0.1;
    $totalDiscountFormatted = number_format($totalDiscount, 2);

    return "Discounts for each number typed in the array (10%): <br>{$resultString}.<br>Total discount: \${$totalDiscountFormatted}";
}

// Exercise 4
function tax($year, $money) {
    if($year < 2020) {
        return $money  + (0.05 * $money);
    } else if($year >= 2000  && $year <= 2010) {
        return $money + (0.08 * $money);
    } else if($year >= 2011 && $year <= 2020) {
        return $money + (0.1 * $money);
    } else if($year > 2020 ) {
        return $money + (0.14 * $money);
    }
}

function calculateTax($year, $income) {
    if(!is_numeric($year) || !is_numeric($income)) {
        die("Year and income and year must be numeric values.");
    }
    
    switch(true) {
        case $year < 2000;
        $taxRate = 0.05;
            break;
            
        case $year >= 2000 && $year <= 2010:
            $taxRate = 0.08;
            break;
        
        case $year >= 2011 && $year <= 2020;
            $taxRate = 0.1;
            break;

        case $year > 2020;
            $taxRate = 0.14;
            break;
        }
        
    $taxText = "Total amount on the $$income income is: ";
    $totalTax = $income + ($income * $taxRate);

    return $taxText . "$" . $totalTax;
}

