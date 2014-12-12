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

use Protobile\Types\StablePriorityQueue;
use Protobile\Types\Middleware;

class Middlewares
{
    protected static $instance = null;
    protected $middlewares     = [];

    public function __construct()
    {
        $this->middlewares = new StablePriorityQueue();
    }

    protected function insert(Middleware $middleware, $priority)
    {
        $this->middlewares->insert($middleware, $priority);
    }

    /**
     * @return Middlewares
     */
    protected static function get_instance()
    {
        if (null == self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param Middleware $middleware
     * @param int        $priority
     */
    public static function register(Middleware $middleware, $priority = 100)
    {
        self::get_instance()->insert($middleware, $priority);
    }
}