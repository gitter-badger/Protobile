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
use Protobile\Core\Http\Request;
use Protobile\Core\Http\Response;

class ModuleExecutor extends Middleware
{
    public function run(Request $request, Response $response)
    {
        $output = self::run_module($response->get_module_to_run());
        $response->get_output_formatter()->set_output($output);
    }

    public static function run_module($module_name)
    {
        ob_start();
        // Modules must always be executed within output buffer

        return ob_get_clean();
    }
}