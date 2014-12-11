<?php
/**
 * This file contains interface of the Router provider
 *
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Interfaces;

use Protobile\Types\RouteCollection;

interface RouterInterface
{
    public function match(RouteCollection $route);
}