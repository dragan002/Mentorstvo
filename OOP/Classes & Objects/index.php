<?php

declare(strict_types=1);
class Auto {

    private string $marka;
    private string $model;
    private string $boja;
    private int $kubikaza;

    public function __construct(string $marka, string $model, string $boja, int $kubikaza) {
        $this->marka = $marka;
        $this->model = $model;
        $this->boja = $boja;
        $this->kubikaza = $kubikaza;
    }

    public function getMarka(): string {
        return $this->marka;
    }

    public function getModel(): string {
        return $this->model;
    }

    public function getBoja(): string {
        return $this->boja;
    }

    public function getKubikaza(): int {
        return $this->kubikaza;
    }
}

$zastava = new Auto('Zastava', 'Yugo45', 'plava', 1600);
echo $zastava->getKubikaza();
echo $zastava->getBoja();

