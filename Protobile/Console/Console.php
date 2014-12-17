<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Console;

use Hoa\Console\Readline\Readline;

class Console
{
    const COLOR_BLACK  = '30';
    const COLOR_RED    = '31';
    const COLOR_GREEN  = '32';
    const COLOR_BROWN  = '33';
    const COLOR_BLUE   = '34';
    const COLOR_PURPLE = '35';
    const COLOR_CYAN   = '36';
    const COLOR_WHITE  = '37';

    const TERM_INPUT_PREFIX = '> ';

    /**
     * @var string
     */
    protected $cwd;

    /**
     * @var Readline
     */
    protected $readline;

    /**
     * @var string
     */
    protected $title = <<<TITLE
|  __ \         | |      | |   (_) |
| |__) | __ ___ | |_ ___ | |__  _| | ___
|  ___/ '__/ _ \| __/ _ \| '_ \| | |/ _ \
| |   | | | (_) | || (_) | |_) | | |  __/
|_|   |_|  \___/ \__\___/|_.__/|_|_|\___|
------------------------------------------
Use "help" to get general help and list of
available commands.
TITLE;

    /**
     * @return Readline
     */
    public function get_readline()
    {
        return $this->readline;
    }

    /**
     * @param Readline $readline
     */
    public function set_readline($readline)
    {
        $this->readline = $readline;
    }

    /**
     * @return string
     */
    public function get_cwd()
    {
        return $this->cwd;
    }

    /**
     * @param string $cwd
     */
    public function set_cwd($cwd)
    {
        $this->cwd = $cwd;
    }

    /**
     * @param $cwd
     * @param Readline $readline
     */
    public function __construct($cwd, Readline $readline)
    {
        $this->set_cwd($cwd);
        $this->set_readline($readline);
    }

    /**
     * Run console
     */
    public function run()
    {
        $this->write_title($this->title, self::COLOR_BLUE);
        while (true) {
            $command     = $this->get_readline()->readLine(self::TERM_INPUT_PREFIX);
            $this->run_command($command);
        }
    }

    /**
     * Run console command
     * @TODO cli command passthrough with command "p"
     * @TODO help generator
     * @TODO tasks from \Protobile\Tasks and \App\Tasks
     * @param $command
     */
    public function run_command($command)
    {
    }

    /**
     * Return all possible commands in Protobile CLI
     * @return array
     */
    public function autocomplete_list()
    {
        return [];
    }

    /**
     * @param $text
     * @param  string  $color
     * @return Console
     */
    public function write($text, $color = null)
    {
        if ($color == null) {
            echo $text;
        }
        echo "\033[" . $color . "m" . $text . "\033[37m";

        return $this;
    }

    /**
     * @param $text
     * @param  string  $color
     * @return Console
     */
    public function write_line($text, $color = null)
    {
        $this->write($text . PHP_EOL, $color);

        return $this;
    }

    /**
     * @param $title
     * @param  string  $color
     * @param  string  $char
     * @param  int     $length
     * @return Console
     */
    public function write_title($title, $color = null, $char = '-', $length = 42)
    {
        $line = str_repeat($char, $length);
        $this->write_line($line, $color);
        $this->write_line($title, $color);
        $this->write_line($line, $color);

        return $this;
    }

    /**
     * Insert newline
     * @return Console
     */
    public function new_line()
    {
        $this->write(PHP_EOL);

        return $this;
    }
}