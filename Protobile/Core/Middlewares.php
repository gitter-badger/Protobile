<?php
/**
 * This file contains a middleware master of the Protobile.
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
use Protobile\Exceptions\ConfigException;
use Protobile\Exceptions\Http301Exception;
use Protobile\Exceptions\Http302Exception;
use Protobile\Exceptions\Http404Exception;
use Protobile\Exceptions\StopException;
use Protobile\Types\StableOrderedPriorityQueue;
use Protobile\Abstracted\Middleware;

class Middlewares
{
    protected $middlewares     = [];
    protected $providers       = [];

    public function __construct(StableOrderedPriorityQueue $queue)
    {
        $this->middlewares = $queue;
    }

    /**
     * @param Middleware  $middleware
     * @param int         $priority
     * @param null|string $provides
     */
    public function register(Middleware $middleware, $priority = 100, $provides = null)
    {
        $this->middlewares->insert($middleware, $priority);
        if (null !== $provides) {
            $this->providers[$provides] = $middleware;
        }
    }

    public function get_provider($provided)
    {
        if (isset($this->providers[$provided])) {
            return $this->providers[$provided];
        }
        throw new ConfigException('Middleware provider "' . $provided . '" requested, none defined. Define in middlewares config.');
    }

    public function execute_chain(Request $request, Response $response)
    {
        $middlewares = $this->middlewares;
        $middlewares->setExtractFlags(StableOrderedPriorityQueue::EXTR_DATA);
        $middlewares->top();

        while ($middlewares->valid()) {
            try {
                $middlewares->current()->run($request, $response);
                $middlewares->next();
            } catch (StopException $e) {
                exit;
            } catch (Http301Exception $e) {
                $response->set_http_exception($e);
                $this->get_provider('http_response')->run($request, $response);
            } catch (Http302Exception $e) {
                $response->set_http_exception($e);
                $this->get_provider('http_response')->run($request, $response);
            } catch (Http404Exception $e) {
                $response->set_http_exception($e);
                $this->get_provider('http_response')->run($request, $response);
            }
        }
    }
}