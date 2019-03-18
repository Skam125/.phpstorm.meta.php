<?php


abstract class Skam
{
    private static $instances = [];

    /**
     * this is private to prevent from creating arbitrary instances
     */
    private function __construct()
    {
    }

    public static function getInstance(string $instanceName)
    {
        if(!class_exists($instanceName))
            return false;

        if(!array_key_exists($instanceName, self::$instances))
            self::$instances[$instanceName] = new $instanceName;

        return self::$instances[$instanceName];
    }

    /**
     * prevent instance from being cloned
     */
    private function __clone()
    {
    }

    /**
     * prevent instance from being unserialized
     */
    private function __wakeup()
    {
    }
}