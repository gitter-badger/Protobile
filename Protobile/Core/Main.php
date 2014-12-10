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

use \Protobile\Exceptions\CoreException;

class Main
{
    /**
     * Application entry point
     */
    public static function run()
    {
        self::validate_core_constants();
    }
    
    /**
     * Validate constants required for normal operation
     */
    protected static function validate_core_constants()
    {
        // Determine if application root is defined
        if(defined('__APP_ROOT__') === false)
        {
            throw new CoreException('Constant "__APP_ROOT__" is not defined. You must define the constant at the entry point (most commonly index.php) to be able to continue');
        }
        
        // Determine if public root is defined
        if(defined('__PUBLIC_ROOT__') === false)
        {
            throw new CoreException('Constant "__PUBLIC_ROOT__" is not defined. You must define the constant at the entry point (most commonly index.php) to be able to continue');
        }
    }
}