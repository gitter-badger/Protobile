<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Types;

class StableOrderedPriorityQueue extends \SplPriorityQueue
{
    const SORT_ASC  = 0x1;
    const SORT_DESC = 0x2;

    protected $serial    = PHP_INT_MAX;
    protected $direction = self::SORT_ASC;

    public function insert($value, $priority)
    {
        parent::insert($value, array($priority, $this->serial--));
    }

    public function __construct($direction = self::SORT_ASC)
    {
        if (self::SORT_ASC !== $direction && self::SORT_DESC !== $direction) {
            throw new \InvalidArgumentException('Invalid sort order. Please, use StableOrderedPriorityQueue::SORT_* constants!');
        }
        $this->direction = $direction;
    }

    public function compare($priority1, $priority2)
    {
        if (self::SORT_ASC === $this->direction) {
            return parent::compare($priority2, $priority1);
        }

        return parent::compare($priority1, $priority2);
    }
}