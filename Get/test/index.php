<form action="receiver.php" method="GET">
    <input type="text" name="data" value="<?= base64_encode("Hello\r\nWorld"); ?>">
    <button type="submit">Submit</button>
</form>

