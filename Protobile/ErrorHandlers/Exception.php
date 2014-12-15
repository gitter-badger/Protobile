<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\ErrorHandlers;

use Protobile\Interfaces\ErrorHandlerInterface;

class Exception implements  ErrorHandlerInterface
{
    public static function handle($exception)
    {
    }
}