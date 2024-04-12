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
}