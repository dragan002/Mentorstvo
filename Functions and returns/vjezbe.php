<?php
include("functions.php");

echo "Vjezba 1";
echo "<br>";
echo multiply(2,5);
echo "<br>";
echo multiply2(2,3,4,5);
echo "<br><hr>";

echo "Vjezba 2";
echo "<br>";

echo calculateDiscountPrice(1500, 10);
echo "<br>";
echo "<br>";

echo discountForEachElement(250,330,1000,2000,5000);

echo "<hr>Exercise 4 -Tax<br>";
echo tax(2020, 3000);
echo "<hr>Exercise 4 -Tax<br>";
echo calculateTax(1999, 10000) . "<br>";


$places = [
    'Subotica' => 220,
    'Pancevo' => 10,
    'Sarajevo' => 292,
    'Split' => 799
];


foreach( $places as $city=>$distance ) {
   echo  $city . $distance;
}
echo countOrder(2000, 'Split');