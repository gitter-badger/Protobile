<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Core\Http;

class InputContainer
    implements \ArrayAccess, \Iterator
{
    /**
     * @var array
     */
    protected $data = array();

    /**
     * @var int
     */
    protected $index     = 0;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function __debugInfo()
    {
        return ['data' => $this->data];
    }

    /**
     * @param mixed $key
     * @param mixed $value
     */
    public function offsetSet($key, $value)
    {
        if (is_null($key)) {
            $this->data[] = $value;
        } else {
            $this->data[$key] = $value;
        }
    }

    /**
     * @param  mixed $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * @param mixed $key
     */
    public function offsetUnset($key)
    {
        unset($this->data[$key]);
    }

    /**
     * @param  mixed                      $key
     * @param  bool                       $raw
     * @return InputContainer|string|void
     */
    public function offsetGet($key, $raw = false)
    {
        if (isset($this->data[$key])) {
            if ($raw) {
                return $this->data[$key];
            }
            if ((array) $this->data[$key] === $this->data[$key]) {
                return new self($this->data[$key]);
            }

            return htmlspecialchars($this->data[$key], ENT_QUOTES, 'UTF-8');
        }

        return;
    }

    /**
     * @param  null                             $key
     * @return array|InputContainer|string|void
     */
    public function raw($key = null)
    {
        if ($key == null) {
            return $this->data;
        }

        return $this->offsetGet($key, true);
    }

    /**
     *
     */
    public function rewind()
    {
        $this->index = 0;
    }

    /**
     * @return InputContainer|string
     */
    public function current()
    {
        $keys   = array_keys($this->data);
        $var    = $this->data[$keys[$this->index]];
        if ((array) $var === $var) {
            return new self($var);
        }

        return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
    }

    /**
     * @return InputContainer|string
     */
    public function key()
    {
        $keys   = array_keys($this->data);
        $var    = $keys[$this->index];
        if ((array) $var === $var) {
            return new self($var);
        }

        return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
    }

    /**
     * @return bool|InputContainer|string
     */
    public function next()
    {
        $keys = array_keys($this->data);
        if (isset($keys[++$this->index])) {
            $var = $this->data[$keys[$this->index]];
            if ((array) $var === $var) {
                return new self($var);
            }

            return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function valid()
    {
        $key   = array_keys($this->data);
        $var   = isset($key[$this->index]);

        return $var;
    }

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @param $key
     * @return InputContainer|string|void
     */
    public function __get($key)
    {
        if (array_key_exists($key, $this->data)) {
            $value = $this->data[$key];
            if ((array) $value === $value) {
                return new self($value);
            }

            return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }

        return;
    }

    /**
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * @param $key
     */
    public function __unset($key)
    {
        unset($this->data[$key]);
    }
}