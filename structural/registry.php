<?php

abstract class Registry
{
    private static array $services = [];

    final public static function setService($key, Service $service)
    {
        self::$services[$key] = $service;
    }

    final public static function getService($key): ?Service
    {
        if (isset(self::$services[$key])) {
            return self::$services[$key];
        }
        return null;
    }
}

class Service
{

}

$service = new Service();

Registry::setService(1, $service);

$service = Registry::getService(1);

var_dump($service);