<?php
require_once("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $broj1 = isset($_GET['broj1']) ? $_GET['broj1'] : 0;
    $broj2 = isset($_GET['broj2']) ? $_GET['broj2'] : 0;
    $operacije = isset($_GET['operacije']) ? $_GET['operacije'] : 'Netacna operacije';

    $result = ($operacije == 'sabiranje') ? sabiranje($broj1, $broj2) : oduzimanje($broj1, $broj2);
    
    echo $result;
} else {
    echo 'Invalid request method';
}
?>
