<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\App\Controllers;

use Protobile\Abstracted\GloballyExtendable;

abstract class Controller extends GloballyExtendable
{
    protected $view;
}