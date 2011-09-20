<?php

define('PHP_BDD_ROOT', dirname(dirname(__FILE__)));

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

set_include_path( dirname(dirname(__FILE__ )) . '/vendor/:' . get_include_path());
set_include_path( dirname(dirname(__FILE__ )) . '/vendor/cuke4php/lib/:' . get_include_path());
set_include_path( dirname(dirname(__FILE__ )) . '/vendor/phpwebdriver/:' . get_include_path());
set_include_path( dirname(dirname(__FILE__ )) . '/lib/:' . get_include_path());

// require_once "phpwebdriver/WebDriver.php";
// require_once "phpwebdriver/LocatorStrategy.php";
require_once 'CucumberSteps.php';
