<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Abstracted;

use Protobile\Core\Config;
use Protobile\Core\Http\Request;
use Protobile\Core\Http\Response;
use Protobile\Core\Middlewares\Router;

abstract class Middleware
{
    abstract public function run(
        Request $request,
        Response $response,
        Router $router,
        Config $config
    );
}