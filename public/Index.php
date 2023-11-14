<?php

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH',  $root . 'app' . DIRECTORY_SEPARATOR);
define('STORAGE_PATH', $root . 'storage' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require_once(APP_PATH . 'App.php');
require_once(VIEWS_PATH . 'Interface.php');

