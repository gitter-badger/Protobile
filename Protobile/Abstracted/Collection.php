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
    private $container = array();
    private $index     = 0;

    abstract public function validateItem($item, $key);

    protected function invokeValidator($item, $key)
    {
        if (!$this->validateItem($item, $key)) {
            throw new \InvalidArgumentException('Validation of collection item failed for index "' . $key . '"');
        }
    }

    public function __construct(array $data = null)
    {
        if (empty($data)) {
            return;
        }
        foreach ($data as $key => $item) {
            $this->invokeValidator($item, $key);
        }
        $this->container = $data;
    }

    public function offsetSet($key, $value)
    {
        $this->invokeValidator($value, $key);
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
        $key = array_keys($this->container);

        return $this->container[$k[$this->index]];
    }

    public function key()
    {
        $key = array_keys($this->container);

        return $key[$this->index];
    }

    public function next()
    {
        $key = array_keys($this->container);
        if (isset($key[++$this->index])) {
            return $this->container[$key[$this->index]];
        } else {
            return false;
        }
    }

    public function valid()
    {
        $key = array_keys($this->container);

        return isset($key[$this->index]);
    }

    public function __set($keyey, $value)
    {
        $this->invokeValidator($item, $key);
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