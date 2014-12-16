<?php
/**
 * This file contains a abstract base for Collections
 *
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Abstracted;

abstract class Collection implements \ArrayAccess, \Iterator
{
    private $container = [];
    private $index     = 0;

    abstract public function validateItem($key, $value);

    protected function invokeValidator($key, $value)
    {
        if (!$this->validateItem($key, $value)) {
            throw new \InvalidArgumentException('Validation of collection item failed for index "' . $key . '"');
        }
    }

    public function __construct(array $data = null)
    {
        if (empty($data)) {
            return;
        }
        foreach ($data as $key => $value) {
            $this->invokeValidator($key, $value);
        }
        $this->container = $data;
    }

    public function offsetSet($key, $value)
    {
        $this->invokeValidator($key, $value);
        if (is_null($key)) {
            $this->container[] = $value;
        } else {
            $this->container[$key] = $value;
        }
    }

    public function offsetExists($key)
    {
        return isset($this->container[$key]);
    }

    public function offsetUnset($key)
    {
        unset($this->container[$key]);
    }

    public function offsetGet($key)
    {
        if (isset($this->container[$key])) {
            return $this->container[$key];
        }

        return;
    }

    public function rewind()
    {
        $this->index = 0;
    }

    public function current()
    {
        $keys = array_keys($this->container);

        return $this->container[$keys[$this->index]];
    }

    public function key()
    {
        $keys = array_keys($this->container);

        return $keys[$this->index];
    }

    public function next()
    {
        $keys = array_keys($this->container);
        if (isset($keys[++$this->index])) {
            return $this->container[$keys[$this->index]];
        } else {
            return false;
        }
    }

    public function valid()
    {
        $keys = array_keys($this->container);

        return isset($keys[$this->index]);
    }

    public function __set($key, $value)
    {
        $this->invokeValidator($key, $value);
        $this->container[$key] = $value;
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->container)) {
            return $this->container[$key];
        }

        return;
    }

    public function __isset($key)
    {
        return isset($this->container[$key]);
    }

    public function __unset($key)
    {
        unset($this->container[$key]);
    }
}