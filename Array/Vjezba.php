<?php 

$cars = ['Bmw', 'Mercedes', 'Audi'];
$cars[] = 'Zastava';


echo implode(', ', array($cars[3], $cars[1], $cars[0], $cars[2])) . "<br>";
echo $number = count($cars);
