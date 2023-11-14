<?php
if (isset($_POST['run_script'])) {

    $inputDir = STORAGE_PATH . 'Vignettes' . DIRECTORY_SEPARATOR;
    $outputDir = STORAGE_PATH . 'Output' . DIRECTORY_SEPARATOR;
    $files = scandir($inputDir);
    $sourceCountry = "EU";
    $countryCodes = ["BE", "DE", "BG", "SE", "DK", "NL", "ISL", "GF", "UK", "NO"];
    $fileExtensions = ["lg", "sm", "tn"];
    $commonPrefixes = [];

    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $commonPrefix = substr($file, 0, strpos($file, $sourceCountry));

            if (!in_array($commonPrefix, $commonPrefixes)) {
                $commonPrefixes[] = $commonPrefix;
            }
        }
    }

    foreach ($commonPrefixes as $prefix) {
        foreach ($countryCodes as $code) {
            foreach ($fileExtensions as $ext) {
                $sourceFile = $inputDir . $prefix . $sourceCountry . "_$ext.png";
                $newFormat = $outputDir . $prefix . $code . "_$ext.png";

                if (file_exists($sourceFile)) {
                    copy($sourceFile, $newFormat);
                    echo "$newFormat successfully created ✅ <br />";
                } else {
                    echo "$sourceFile doesn't exist! <br />";
                }
            }
        }
    }
}