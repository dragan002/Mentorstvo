<?php

class Product {
    public $name;
    public $desc;
    public $price;
    public $image;
    public $quantity;

    public function __construct($name, $desc, $price, $image, $quantity) {
        $this->name = $name;
        $this->desc = $desc;
        $this->price = $price;
        $this->image = $image;
        $this->quantity = $quantity;
    }

    public function save() {
        $db = mysqli_connect('localhost', 'root', '', 'web_shop');
    
        $name = $db->real_escape_string($this->name);
        $desc = $db->real_escape_string($this->desc);
        $price = $db->real_escape_string($this->price);
        $image = $db->real_escape_string($this->image);
        $quantity = $db->real_escape_string($this->quantity);
    
        $db->query("INSERT INTO product (name, `desc`, price, image, quantity) VALUES ('$name', '$desc', '$price', '$image', '$quantity')");
    }
    
}