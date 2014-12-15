<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Core;


class EventManager {

    /**
     * @var array
     */
    protected static $event_registry = [];

    /**
     * @return array
     */
    public static function get_event_registry()
    {
        return self::$event_registry;
    }

    /**
     * @param array $event_registry
     */
    public static function set_event_registry(array $event_registry)
    {
        self::$event_registry = $event_registry;
    }


    /**
     * @param $name
     * @param mixed $arg1
     * @param mixed $arg2
     */
    public static function call($name, $arg1=null, $arg2=null){

    }

    /**
     * @param $name
     * @param $callable
     */
    public static function register($name, $callable){

    }

    /**
     * @param $name
     */
    public static function clear($name){

    }


}