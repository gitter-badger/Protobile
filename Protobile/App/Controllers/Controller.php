<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\App\Controllers;

use Protobile\Abstracted\GloballyExtendable;
use Protobile\Core\Config;
use Protobile\Core\Http\Request;
use Protobile\Core\Http\Response;

abstract class Controller extends GloballyExtendable
{
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var Response
     */
    protected $response;
    /**
     * @var Config
     */
    protected $config;

    /**
     * @return Request
     */
    public function get_request()
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function set_request(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return Response
     */
    public function get_response()
    {
        return $this->response;
    }

    /**
     * @param Response $response
     */
    public function set_response(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return Config
     */
    public function get_config()
    {
        return $this->config;
    }

    /**
     * @param Config $config
     */
    public function set_config(Config $config)
    {
        $this->config = $config;
    }

    public function __construct(
        Request $request,
        Response $response,
        Config $config
    ) {
        $this->set_request($request);
        $this->set_response($response);
        $this->set_config($config);
    }
}