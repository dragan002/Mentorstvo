<?php

class Vehicle {
    public $weight;
    public $height;
    public $type;

    public function __construct($weight, $height, $type) {
        $this->weight = $weight;
        $this->height = $height;
        $this->type = $type;
    }
}