<?php
/**
 * This file contains Route type collection.
 *
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */
 
namespace Protobile\Types;

use Protobile\Abstract\Collection;
use Protobile\Types\Route;

class RouteCollection
{
    public function validateItem($value, $key)
    {
        return ($value instanceof Route);
    }
}