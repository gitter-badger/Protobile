<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Utility;

class ArrayUtility
{
    /**
     * Access array key by dot.access.syntax
     * @param $key
     * @param $array
     * @return mixed
     */
    public static function get_dot_value($key, $array)
    {
        if (empty($key)) {
            return $array;
        }
        $keys  = explode('.', $key);
        $depth = count($keys);
        $i     = 1;
        foreach ($keys as $key_part) {
            if (isset($array[$key_part]) == false) {
                trigger_error('Unknown value - "' . $key . '"');

                return;
            }
            $array = $array[$key_part];
            if ($depth === $i) {
                return $array;
            }
            $i++;
        }

        return $array;
    }

    /**
     * Set array key by dot.access.syntax
     * @param $key
     * @param $value
     * @param $array
     */
    public static function set_dot_value($key, $value, &$array)
    {
        $keys  = explode('.', $key);
        $depth = count($keys);
        $i     = 1;
        foreach ($keys as $key_part) {
            if (isset($array[$key_part])) {
                if ($depth === $i) {
                    $array[$key_part] = $value;
                } else {
                    $array = &$array[$key_part];
                }
            } else {
                if ($depth === $i) {
                    $array[$key_part] = $value;
                } else {
                    $array[$key_part] = [];
                }
                $array            = &$array[$key_part];
            }
            $i++;
        }
    }

    /**
     * Delete array key by dot.access.syntax
     * @param $key
     * @param $array
     */
    public static function delete_dot_value($key, &$array)
    {
        $keys  = explode('.', $key);
        $depth = count($keys);
        $i     = 1;
        foreach ($keys as $key_part) {
            if (isset($array[$key_part])) {
                if ($depth === $i) {
                    unset($array[$key_part]);
                } else {
                    $array = &$array[$key_part];
                }
            }
            $i++;
        }
    }
}