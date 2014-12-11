<?php
/**
 * This file contains a single-request memoizer implementation
 *
 * @todo Oh old class. Refactor?
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

class Memoize
{
    /**
     * Method or callable to memoize
     */
    protected $target = null;

    /**
     * Memoized results
     */
    protected $memo = array();

    /**
     * Hash alghorithm to use
     */
    protected $hash = 'md5';

    /**
     * Global bucket of memos to use with globalize
     */
    protected static $bucket = array();

    public function __construct($callable)
    {
        $this->setCallable($callable);
    }

    /**
     * Invoke callable from target
     * @throws UnexpectedValueException
     */
    public function __invoke()
    {
        if ($this->target == null) {
            throw new \UnexpectedValueException('Target is null when it should be closure or callable');
        }
        $args = func_get_args();
        $hash = hash($this->hash, implode($args));
        if (isset($this->memo[$hash])) {
            $this->memo[$hash]['hits']++;

            return $this->memo[$hash]['value'];
        }
        $this->memo[$hash]['hits'] = 0;
        $result                    = $this->memo[$hash]['value']                    =  call_user_func_array($this->target, $args);

        return $result;
    }

    /**
     * Invoke globalized target
     * @return mixed
     * @throws BadMethodCallException
     */
    public static function __callstatic($name, $args)
    {
        if (isset(self::$bucket[$name]) == false) {
            throw new \BadMethodCallException('No such method globalized');
        }

        return call_user_func_array(self::$bucket[$name], $args);
    }

    /**
     * Get instance of target
     * @return Object|boolean
     */
    public static function getInstance($name)
    {
        if (isset(self::$bucket[$name])) {
            return self::$bucket[$name];
        }

        return false;
    }

    /**
     * Set hash algorithm
     * @throws InvalidArgumentException
     */
    public function setHashAlgo($algo)
    {
        if (in_array($algo, hash_algos())) {
            $this->hash = $algo;

            return $this;
        }
        throw new \InvalidArgumentException('Unknown alghoritm ' . $algo);
    }

    /**
     * Clean target's cache
     * @return Memoize
     */
    public function purge()
    {
        $this->memo = array();

        return $this;
    }

    /**
     * Dump target's cache to array
     * @return array
     */
    public function dump()
    {
        return $this->memo;
    }

    /**
     * Load targets cache from array
     * @param  array   $dump
     * @return Memoize
     */
    public function load($dump)
    {
        $this->memo = $dump;

        return $this;
    }

    /**
     * Globalize the target to be available via Memoize::static method call.
     * @param  string                   $name
     * @throws InvalidArgumentException
     * @throws ErrorException
     * @return Memoize
     */
    public function globalize($name)
    {
        if (is_scalar($name) == false || is_numeric($name) == true) {
            throw new \InvalidArgumentException('Global name must be valid method name');
        }
        if (isset(self::$bucket[$name])) {
            throw new \ErrorException('Name is already used');
        }
        self::$bucket[$name] = $this;

        return $this;
    }

    /**
     * Reassign callable for this target
     * @param  Object|callable          $callable
     * @throws InvalidArgumentException
     * @return Memoize
     */
    public function setCallable($callable)
    {
        if (is_callable($callable) || function_exists($callable)) {
            $this->target = $callable;
        } else {
            throw new InvalidArgumentException('Argument supplied to memoize is not a callable');
        }

        return $this;
    }
}