<?php

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