<?php

define('PHP_BDD_ROOT', dirname(dirname(__FILE__)));



set_include_path( dirname(__FILE__) . '/vendor/:' . get_include_path());
set_include_path( dirname(__FILE__) . '/vendor/phpwebdriver/:' . get_include_path());
set_include_path( dirname(__FILE__) . '/lib/:' . get_include_path());

