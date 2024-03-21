<?php
declare(strict_types=1);
require_once 'classes/Person.php';
require_once 'classes/Auto.php';


$zastava = new Car('Zastava', 'Yugo45', 'plava', 1600);
print_r($zastava);
echo "<hr>";
$zastava->setNewPaint('crvena');
print_r($zastava);
echo "<hr>";
echo $zastava->carDescription();


$dragan = new Person('Dragan', 'Vujic', 1995, 184, 85);
echo $dragan->ages($dragan->getYearOfBirth()) . "<hr>";

