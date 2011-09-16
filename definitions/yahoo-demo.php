<?php

require_once dirname(dirname(__FILE__))  . '/test_helper.php';


require_once "phpwebdriver/WebDriver.php";
require_once "phpwebdriver/LocatorStrategy.php";

$webdriver = new WebDriver("localhost", "4444");
$webdriver->connect("firefox");                            
$webdriver->get("http://www.yahoo.com");

$element = $webdriver->findElementBy(LocatorStrategy::cssSelector, "input[title='Web Search']");
$element->sendKeys(array('Selenium Is Awesome'));
$element->submit();

$webdriver->getScreenshotAndSaveToFile('test.png');

$webdriver->close();



?>