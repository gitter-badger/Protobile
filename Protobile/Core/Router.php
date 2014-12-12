<?php
/**
 * This file contains a configuration manager for Protobile
 *
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Core;

use Protobile\Core\Http\Request;
use Protobile\Core\Http\Response;
use Protobile\Interfaces\RouterInterface;
use Protobile\Abstracted\Middleware;

class Router extends Middleware implements RouterInterface
{
    public function run(Request $request, Response $response)
    {
    }
}