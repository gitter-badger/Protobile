<?php
/**
 * This file contains a DepenedencyInjector class
 *
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Core;

class DependencyInjector
{
    protected $services  = [];
    protected $instances = [];

    public function request_global_service($class, array $args = null)
    {
        if (!isset($this->services[$class])) {
            $this->instances[$class] = $this->request_new_service($class, $args);
        }

        return $this->instances[$class];
    }

    public function request_new_service($class, array $args = null)
    {
        if (!isset($this->services[$class])) {
            if (class_exists($class, true)) {
                return $this->create_instance($class, $args);
            }
            throw new \ErrorException('Requested service is not registered and has no default class for service "' . $class . '"');
        }

        return $this->create_instance($this->services[$class], $args);
    }

    protected function create_instance($class, $args)
    {
        if (null === $args) {
            $args = [];
        }

        $class       = new ReflectionClass($class);
        $constructor = $class->getConstructor();
        $parameters  = $class->getParameters();
        
        foreach ($params as $param) {
            //TODO: validate array null and params etc, and throw appropriate exceptions
            if ($param->getClass() !== null) {
            }
        }

        return $class->newInstanceArgs($args);
    }

    public function map_service($class_name, $class_provider)
    {
    }
}