<?php

$meni = ['Glavna', 'O nama', 'Kontakt'];

function naziv_sajta($naziv) {    
    if(!empty($naziv)) {
        echo $naziv;
    } else {
        echo "Nema podataka o nazivu sajta!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php naziv_sajta('cool site'); ?></title>
</head>
<body>
    <?php 
        foreach($meni as $item) {
            echo '<a href= "">' . $item . '</a>';
        }
    ?>
</body>
</html>