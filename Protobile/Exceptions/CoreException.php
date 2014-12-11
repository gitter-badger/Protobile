<?php
/**
 * This exception is thrown in case of critical system failure.
 * This exception MUST be handled as state when application is unable to continue.
 *
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Exceptions;

class CoreException extends \Protobile\Exceptions\BaseException
{
}