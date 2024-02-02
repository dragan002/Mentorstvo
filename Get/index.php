<?php 
require_once("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="calculator.php" method = "GET">
        <input type="text" name="broj1">
        <input type="text" name="broj2">
        <select name="operacije">
            <option value="sabiranje">Sabiranje</option>
            <option value="oduzimanje">Oduzimanje</option>
        </select>
        <button type = "submit" >Submit</button>
    </form>
</body>
</html>