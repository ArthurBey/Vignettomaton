<?php

class VignettesProcessor
{
    private $sourceDir;
    private $destinationDir;
    private $sourceCountry;
    private $countryCodes;
    private $commonPrefix = null;
    private $commonPrefixTemp = null;
    private $fileExtensions = ["lg", "sm", "tn"];

    public function __construct($sourceDir, $destinationDir, $sourceCountry, $countryCodes) {
        $this->sourceDir = $sourceDir;
        $this->destinationDir = $destinationDir;
        $this->sourceCountry = $sourceCountry;
        $this->countryCodes = $countryCodes;
    }

    public function processFiles() {
        $files = scandir($this->sourceDir);

        foreach($files as $file) {
            if ($file !== '.' && $file !== '..') {
                if ($this->commonPrefixTemp === null) {
                    $this->commonPrefixTemp = substr($file, 0, strpos($file, $this->sourceCountry));
                }
                $this->commonPrefix = substr($file, 0, strpos($file, $this->sourceCountry));

                try {
                    if ($this->commonPrefixTemp !== $this->commonPrefix) {
                        throw new Exception("Cannot process thumbnails; Files have different prefixes");
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                    return;
                }

            }
        }

        foreach ($this->countryCodes as $code) {
            foreach ($this->fileExtensions as $ext) {
                $sourceFile = $this->sourceDir . $this->commonPrefix . $this->sourceCountry . "_$ext.png";
                $destinationFile = $this->destinationDir . $this->commonPrefix . $code . "_$ext.png";

                if (file_exists($sourceFile)) {
                    copy($sourceFile, $destinationFile);
                    echo $this->commonPrefix . $code . "_$ext.png : successfully created ✅ <br />";
                }
            }
        }
    }
}