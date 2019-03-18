<?php

abstract class AbstractSkam
{
    private static $instances = [];

    /**
     * this is private to prevent from creating arbitrary instances
     */
    private function __construct()
    {
    }

    public static function generateMeta()
    {
        $meta = '';
        $classes = glob('classes/*.php');
        if(!empty($classes))
            foreach ($classes as $class){
                $className = pathinfo($class)['filename'];
                if((strpos($className,'Abstract') === false) && (strpos($className,'Interface') === false))
                    $meta .= '"'.$className.'" => \\'.$className.'::class,'.PHP_EOL;
            }
        if(!empty($meta))
            file_put_contents('.phpstorm.meta.php', '<?php
            
            namespace PHPSTORM_META {
            override(\AbstractSkam::getInstance(0),
                map(['
                 .PHP_EOL.$meta.
                ']));
            }');
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