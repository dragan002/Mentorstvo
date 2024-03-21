<?php

class Car {

    private string $brand;
    private string $model;
    private string $color;
    private int $engineDisplacement;

    public function __construct(string $brand, string $model, string $color, int $engineDisplacement) {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->engineDisplacement = $engineDisplacement;
    }

    public function carDescription() {
        return  "Brand: ". $this->brand . ", model: ". $this->model .", color: ". $this->color. ", engine displacement: ";
    }
    //setters
    public function setNewPaint(string $color): string {
        return $this->color = $color;
    }
    //getters

    public function getBrand(): string {
        return $this->brand;
    }

    public function getModel(): string {
        return $this->model;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function getEngineDisplacement(): int {
        return $this->engineDisplacement;
    }
}
