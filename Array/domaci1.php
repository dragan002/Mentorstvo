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
    <title><?php naziv_sajta('Cool site'); ?></title>
</head>
<body>
    <h2>
        <a href="home.php"><?php echo $meni[0] ?></a>
        <a href="about_us.php"><?php echo $meni[1] ?></a>
        <a href="contact.php"><?php echo $meni[2] ?></a>
    </h2>

    <footer>
        &copy; <?php echo date("Y"); ?> Lazar Hrebeljanovic. All rights reserved.<br />
    </footer>
</body>
</html>