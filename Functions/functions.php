<?php

function validateNumber($number) {
    if (!is_numeric($number)) {
        throw new InvalidArgumentException("Invalid input");
    }
}

function isZero($number) {
  return $number == 0 ;
}

function isEven($number) {
    return $number % 2 == 0;
}

