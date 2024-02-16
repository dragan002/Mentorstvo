<?php
include_once('functions.php');
// function pairUnpair($number) {
//     if (!is_numeric($number)) {
//         die('Input is not valid');
//     } elseif($number == 0) {
//         return "Number can't be zero.";
//     } elseif ($number % 2 == 0) {
//         return 'The number is even.';
//     } else {
//         return 'The number is odd.';
//     }
// }

// echo pairUnpair(0);

function pairUnpair($number) {
    try {
        validateNumber($number);

        if(isZero($number)) {
            throw new Exception("Number can't be zero.");
        } elseif (isEven($number)) {
            return "The number is even";
        } else {
            return "The number is odd";
        }

    } catch (InvalidArgumentException $e) {
        return $e->getMessage();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

echo pairUnpair(0);