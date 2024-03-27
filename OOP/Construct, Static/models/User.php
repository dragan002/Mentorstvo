<?php

class User {
    public $email;
    public $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function save() {
        $db = mysqli_connect('localhost', 'root', '', 'web_shop');

        $email = $db->real_escape_string($this->email);
        $password = $db->real_escape_string($this->password);

        $db->query("INSERT INTO `korisnicii` (email, password) VALUES ('$email', '$password') ");
    }
}
