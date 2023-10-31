<!DOCTYPE html>
<html>
<head>
    <title>Vignettomaton</title>
</head>
<body style="background-color: grey">
<h1>Vignettomaton</h1>
<p>Provide the 3 format files with the "EU" variation</p>
<form method="post" action="index.php">
    <input type="submit" name="run_script" value="Run Script">
</form>
</body>
</html>

<?php
require_once('VignettesProcessor.php');

if (isset($_POST['run_script'])) {
    $sourceDir = 'C:\xampp\htdocs\Vignettomaton\Vignettes\\';
    $destinationDir = 'C:\xampp\htdocs\Vignettomaton\Output\\';
    $sourceCountry = "EU";
    $countryCodes = ["FR", "BE", "DE", "BG", "SE", "DK", "NL", "ISL", "GF", "UK", "NO"];

    $processor = new VignettesProcessor(
        $sourceDir,
        $destinationDir,
        $sourceCountry,
        $countryCodes
    );
    $processor->processFiles();

}