<?php

$brojevi = [22, 53, 36, 46, 13];
$date = date("l jS \of F Y");

$suma = 0;
echo "Danas je: $date i tvoji srecni brojevi su <br><hr>";



foreach($brojevi as $broj) {
    if($broj % 9 == 0) {
        continue;
    } 
    $suma+=$broj;
}
echo $suma . "<hr>";

echo array_sum($brojevi)- $brojevi[1];
