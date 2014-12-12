<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Types;

class StablePriorityQueue extends \SplPriorityQueue
{
    protected $serial = PHP_INT_MAX;
    public function insert($value, $priority)
    {
        parent::insert($value, array($priority, $this->serial--));
    }
}