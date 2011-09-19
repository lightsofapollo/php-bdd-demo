<?php

require_once dirname(dirname(__FILE__))  . '/test_helper.php';


require_once "phpwebdriver/WebDriver.php";
require_once "phpwebdriver/LocatorStrategy.php";

$webdriver = new WebDriver("uncleonce.greatamerica.corp.yahoo.com", "4444");

// echo "Connecting to driver \n";

$webdriver->connect("firefox");         

// echo "Going to yahoo.com\n";
                   
$webdriver->get("http://www.yahoo.com");

// echo "Searching...\n";

$element = $webdriver->findElementBy(LocatorStrategy::cssSelector, "input[title='Web Search']");
$element->sendKeys(array('Selenium Is Awesome'));
$element->submit();

// echo "Submitted \n";

$webdriver->getScreenshotAndSaveToFile('new-test.png');

$webdriver->close();



?>