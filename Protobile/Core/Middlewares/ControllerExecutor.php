<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Core\Middlewares;

use Protobile\Abstracted\Middleware;
use Protobile\Core\Config;
use Protobile\Core\Http\Request;
use Protobile\Core\Http\Response;

class ControllerExecutor extends Middleware
{
    public function run(Request $request, Response $response, Router $router, Config $config)
    {
        $output = self::run_controller($response->get_controller_to_run(), $request, $response, $router, $config);
        $response->get_output_formatter()->set_output($output);
    }

    public static function run_controller($module_name, Request $request, Response $response, Router $router, Config $config)
    {
        ob_start();
        // Modules must always be executed within output buffer

        return ob_get_clean();
    }
}