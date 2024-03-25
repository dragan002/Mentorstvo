<?php

class User implements PasswordValidator {
    private $email;
    private $hashedPassword;

    public function __construct(string $email, string $password ) {
        $this->email = $email;
        $this->setPassword($password);
    }

    public function setEmail(string $email): void {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Invalid email address");
        }
        $this->email = $email;
    }

    public function getEmail(string $email): string {
        return $this->email;
    }

    public function setPassword(string $password): void {
        $this->hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        }
    }
