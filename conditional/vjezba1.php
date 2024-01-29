<?php

require('functions.php');

$godinaRodjenja = 1995;

if($godinaRodjenja == 1992) {
    echo "Imate 31 godinu";
} else if($godinaRodjenja == 1999) {
    echo "Imate 24 godinu";
} else if($godinaRodjenja == 1990) {
    echo "imate 33 godine";
} else {
    
    echo $godine = date('Y') - $godinaRodjenja . "<hr>";
}
// ternary operator

echo ($godinaRodjenja == 1992) ? "imate 31 godinu" :
     (($godinaRodjenja == 1999) ? "imate 24godine" :
     (($godinaRodjenja == 1990) ? "Imate 33 godine" : $godine));

//Vjezba
echo parNepar(10) . "<hr>";

//vjezba 2
$golfNiz = ['Golf 1', 'Golf 2', 'Golf 3'];

if(array_search('Golf 2', $golfNiz)) {
    echo "Nasli smo najboljeg golfa";
} else {
    echo "not there";
}
// Pitanje za konsultacije
//Koristion si in_array, da li se moze na ovaj nacin da idem array_search. Da li je dobra praksa u slicnim slucajevim raditi pomocu search

//vjezba 3
echo "<hr>";
$godine = 18;
echo ($godine <= 19) ? "Vi ste punoljetni" : "Vi ste maloljetni";

echo "<hr>";
echo brojGodina(17);

