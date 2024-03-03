<?php 

function validateInput($value, $fieldName) {
    if(!isset($value) || empty($value)) {
        die("Try again, $fieldName must be valid");
    }
    return $value;
}