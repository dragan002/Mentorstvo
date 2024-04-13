<?php

class Cars {
    public $brand;
    public $model;
    public $color;

    public function __construct($brand, $model, $color) {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
    }
}