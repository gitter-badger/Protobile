<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use Protobile\Core\Main;
use Protobile\Core\Config;
use Protobile\Core\Middlewares;
use Protobile\Core\Http\Request;
use Protobile\Core\Http\Response;
use Protobile\Core\Http\InputContainer;
use Protobile\Core\Http\ServerInputContainer;
use Protobile\Core\OutputFormatter\Html;
use Protobile\Types\StableOrderedPriorityQueue;

// Define runtime options
$root = dirname(__DIR__);
// If you change these, edit project's composer.json
define('__APP_ROOT__', $root . '/App/');
define('__PUBLIC_ROOT__', $root . '/Public/');

// Run application
$config      = new Config(__APP_ROOT__);
$middlewares = new Middlewares(new StableOrderedPriorityQueue(StableOrderedPriorityQueue::SORT_ASC));
$request     = new Request(
    new InputContainer($_GET),
    new InputContainer($_POST),
    new ServerInputContainer($_SERVER),
    new InputContainer($_COOKIE),
    new InputContainer($_FILES)
);
$response = new Response(new Html());
(new Main())->run($config, $middlewares, $request, $response);

echo microtime();