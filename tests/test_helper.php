<?php

require_once dirname(dirname(__FILE__)) . '/test_helper.php';

class Loader
{    
    public static function registerAutoload()
    {
        return spl_autoload_register(array(__CLASS__, 'includeClass'));
    }
    
    public static function unregisterAutoload()
    {
        return spl_autoload_unregister(array(__CLASS__, 'includeClass'));
    }
    
    public static function includeClass($class)
    {
        require(strtr($class, '_\\', '//') . '.php');
    }
}

Loader::registerAutoload();

set_include_path( dirname(dirname(__FILE__ )) . '/vendor/cuke4php/lib/:' . get_include_path());



