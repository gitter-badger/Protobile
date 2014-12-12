<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Abstracted;

use Protobile\Core\Http\Request;
use Protobile\Core\Http\Response;

abstract class Middleware
{
    abstract public function run(Request $request, Response $response);
}