<?php
require_once("functions.php") 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="domaci_kalkulacija.php" method="GET" style="display: flex; flex-direction: column; width: 200px;">
        <input type="text" name="iznos" placeholder="Upisite iznos">
        <select name="proizvod" style="margin-top: 10px;">
            <option value="hrana">Hrana</option>
            <option value="oprema">Oprema za Racunare</option>
        </select>
        <input type="checkbox" name = "checkbox">
        <button type="submit">Izracunaj</button>
    </form>
</body>
</html>