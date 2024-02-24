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
echo calculateTax("ls", "100");