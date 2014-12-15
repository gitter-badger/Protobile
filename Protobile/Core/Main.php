<?php
/**
 * This file contains a core initializer of the Protobile.
 *
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Core;

use Protobile\Abstracted\GloballyExtendable;
use Protobile\Core\Http\Request;
use Protobile\Core\Http\Response;
use Protobile\Exceptions\CoreException;

class Main extends GloballyExtendable
{
    /**
     * @param Config $config
     * @param Middlewares $middlewares
     * @param Request $request
     * @param Response $response
     * @throws CoreException
     */
    public function run(
        Config $config,
        Middlewares $middlewares,
        Request $request,
        Response $response
    ) {
        $this->init_events($config);
        $this->attach_exception_handler($config);
        $this->attach_error_handler($config);
        $this->load_middlewares($config, $middlewares);
        $this->execute($middlewares, $request, $response);
    }


    /**
     * @param $config
     */
    protected function attach_exception_handler($config)
    {
        $exception_handler = $config->get('errorhandler.exceptions');
        ///set_exception_handler([$exception_handler, 'handle']);
    }


    /**
     * @param $config
     */
    protected function attach_error_handler($config)
    {
        $error_handler = $config->get('errorhandler.errors');
        ///set_error_handler([$error_handler, 'handle']);
    }

    /**
     * @param $config
     */
    protected function init_events($config){
        EventManager::set_event_registry($config->get('events'));
        $config->delete('events');
        var_dump($config);
    }


    /**
     * @param Config $config
     * @param Middlewares $middlewares
     * @throws CoreException
     */
    protected function load_middlewares(Config $config, Middlewares $middlewares)
    {
        $registered_middlewares = $config->get('middlewares');
        foreach ($registered_middlewares as $middleware => $params) {
            if (class_exists($middleware) === false) {
                throw new CoreException('Middleware "' . $middleware . '" does not exist');
            }
            $params['provides'] = isset($params['provides']) ? $params['provides'] : null;
            $middlewares->register(new $middleware(), $params['priority'], $params['provides']);
        }
    }


    /**
     * @param Middlewares $middlewares
     * @param Request $request
     * @param Response $response
     */
    protected function execute(Middlewares $middlewares, Request $request, Response $response)
    {
        $middlewares->execute_chain($request, $response);
    }
}