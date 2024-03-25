<?php

interface PasswordValidator {
    // Regular expression pattern for password complexity
    private const PASSWORD_PATTERN = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,}$/';

    // Function to validate password complexity
    public static function validatePassword(string $password): bool {
        return preg_match(self::PASSWORD_PATTERN, $password) === 1;
    }
}

// Example passwords
$passwords = [
    'Weak123!', // Weak password
    'StrongPassword123!', // Strong password
    'noSpecialChars123', // Missing special character
    'OnlyLowercase' // Doesn't meet length requirement
];

// Test the passwords
foreach ($passwords as $password) {
    echo "Password: $password ";
    if (PasswordValidator::validatePassword($password)) {
        echo "meets complexity requirements.\n";
    } else {
        echo "does not meet complexity requirements.\n";
    }
}

?>
