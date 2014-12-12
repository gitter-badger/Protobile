<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Core\OutputFormatter;

use Protobile\Interfaces\OutputFormatterInterface;

class Html implements OutputFormatterInterface
{
    protected $output;

    /**
     * @return null
     */
    public function get_output()
    {
        return $this->output;
    }

    /**
     * @param null $output
     */
    public function set_output($output)
    {
        $this->output = $output;
    }
}