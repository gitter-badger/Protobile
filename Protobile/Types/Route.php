<?php
/**
 * This file contains Route type.
 *
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Types;

use Protobile\Abstracted\Type;

class Route
{
    /**
     * Pattern to match the request against
     * @type string
     */
    protected $pattern = null;

    /**
     * method to match the request against
     * @type string
     */
    protected $host = null;

    /**
     * Method to match request against
     * @type string
     */
    protected $method = null;

    public function __construct($pattern = null, $method = null, $host = null)
    {
        $this->set_pattern($pattern);
        $this->set_method($method);
        $this->set_host($host);
    }

    public function get_pattern()
    {
        return $this->pattern;
    }

    public function set_pattern($pattern)
    {
        if (!is_string($pattern)) {
            throw new \InvalidArgumentException('Route type expects argument "pattern" to be of type string');
        }

        $this->pattern = $pattern;

        return $this;
    }

    public function get_host()
    {
        return $this->host;
    }

    public function set_host($host)
    {
        if (null !== $host && !is_string($host)) {
            throw new \InvalidArgumentException('Route type expects argument "host" to be of type string');
        }

        $this->host = $host;

        return $this;
    }

    public function get_method()
    {
        return $this->method;
    }

    public function set_method($method)
    {
        if (null !== $method) {
            if (!is_string($method)) {
                throw new \InvalidArgumentException('Route type expects argument "method" to be of type string');
            }

            if (!$this->is_valid_method($method)) {
                throw new \InvalidArgumentException('Method must be one of the fpllowing: GET, POST, OPTIONS, HEAD, PUT, DELETE');
            }
        }

        $this->method = $method;

        return $this;
    }

    public function is_valid_method($method)
    {
        return ('OPTIONS' === $method || 'GET' === $method || 'HEAD' === $method || 'POST' === $method || 'PUT' === $method || 'DELETE' === $method);
    }

    public function __toString()
    {
        return $this->pattern;
    }
}