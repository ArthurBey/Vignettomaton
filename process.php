<?php
if (isset($_POST['run_script'])) {

    $sourceDir = 'C:\xampp\htdocs\Vignettomaton\Vignettes\\';
    $destinationDir = 'C:\xampp\htdocs\Vignettomaton\Output\\';
    $files = scandir($sourceDir);
    $sourceCountry = "EU";

    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            if (is_file($sourceDir . $file));
            echo $file . '<br />';
            $commonPrefix = substr($file, 0, strpos($file, $sourceCountry));

        }
    }

    $countryCodes = ["BE", "DE", "BG", "SE", "DK", "NL", "ISL", "GF", "UK", "NO"];

    foreach ($countryCodes as $code) {
        $fileExtensions = ["lg", "sm", "tn"];

        foreach ($fileExtensions as $ext) {
            $sourceFile = $sourceDir . $commonPrefix . $sourceCountry . "_$ext.png";
            $destinationFile = $destinationDir . $commonPrefix . $code . "_$ext.png";

            if (file_exists($sourceFile)) {
                copy($sourceFile, $destinationFile);
                echo "$destinationFile successfully created ✅ <br />";
            }
        }
    }
}