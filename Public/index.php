<?php
require dirname(__DIR__) . '/vendor/autoload.php';

// Define runtime options
$root = dirname(__DIR__);
// If you change theese, edit project's composer.json
define('__APP_ROOT__', $root . '/App/');
define('__PUBLIC_ROOT__', $root . '/Public/');

// Run application
\Protobile\Core\Main::run();