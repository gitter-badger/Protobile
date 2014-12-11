<?php
/**
 * This file contains a abstract base for Types
 * 
 * Note: all types in the system must validate-on-set, e.g. validation
 * of values must be done when values are set, not when they are called
 * or by some indirect means.
 * 
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Abstract;

abstract class Type
{
    /**
     * Get name of the type
     * 
     * @return string
     */
    public function get_type()
    {
        return get_called_class($this);
    }
    
    /**
     * Invoke should by design of the Type system return same as the __toString
     */
    public function __invoke()
    {
        return $this->__toString();
    }
}