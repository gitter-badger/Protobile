<?php
require(dirname(__DIR__).'/vendor/autoload.php');

// Define runtime options
$root = dirname(__DIR__);
define('__APP_ROOT__', $root.'/App/');
define('__PUBLIC_ROOT__', $root.'/Public/');

// Run application
\Protobile\Core\Main::run();