<?php
require 'Models/Car.php';

// $yugo = new Car('Yugo', 'Koral 45', 'Blue');
// $bmw = new Car('Bmw', 'X5', "Black");
// $audi = new Car('Audi','A8L','White');
// $audi->height = 255;
$yugo = new Car();
$yugo->brand = "Yugo";
$yugo->model = "Koral";
$yugo->color = "BLUE";
$yugo->height = 255;

print_r($yugo);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>