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

class ResponseManager extends Middleware
{
    public function run(Request $request, Response $response)
    {
        if ($response->get_http_exception() != null) {
            $this->handle_http_exception($response->get_http_exception(), $request, $response);
        }
        $headers = $response->get_headers();
        foreach ($headers as $key => $value) {
            if (is_int($key)) {
                $key = '';
            }
            header($key . ':' . $value);
        }
        echo $response->get_output_formatter()->get_output();
    }

    protected function handle_http_exception($exception, $request, $response)
    {
    }
}