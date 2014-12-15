<?php
/**
 * This file is reserved for future "global" functions.
 *
 * It should contain global support functions outside any scope that should be available
 * in global scope of the installation.
 *
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

/**
 * Access array key by dot.access.syntax
 * @param $key
 * @param $array
 * @return mixed
 */
function get_dot_value($key, $array)
{
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
function set_dot_value($key, $value, &$array)
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
function delete_dot_value($key, &$array)
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