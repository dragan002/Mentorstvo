<?php
if (isset($_GET['data'])) {
    $decodedData = base64_decode($_GET['data']);
    echo "Received data: $decodedData";
} else {
    echo "No data received.";
}
echo "<hr>";
$data = "Hello World!";
$encodedData = base64_encode($data);
echo $encodedData;

echo "<hr>";
$decodedData = base64_decode($encodedData);
echo "Decoded Data: $decodedData";