<?php

function validateNumber($number) {
    if (!is_numeric($number)) {
        throw new UnexpectedValueException("Invalid value: not numeric");
    }
}

function isZero($number) {
  return $number == 0 ;
}

function isEven($number) {
    return $number % 2 == 0;
}

function calculateTax($num) {
    try {
        if(!is_numeric($num)) {
            // die('input is non-numeric');
            throw new UnexpectedValueException('Non numeric input');
        }

        $totalTax = ($num * 22) / 100;
        return $totalTax;
        
    } catch (UnexpectedValueException $e) {
        echo "Caught UnexpectedValue" . $e->getMessage();
    }
}