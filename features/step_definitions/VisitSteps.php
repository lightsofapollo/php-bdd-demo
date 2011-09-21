<?php

require_once "phpwebdriver/WebDriver.php";
require_once "phpwebdriver/LocatorStrategy.php";
require_once 'PhpBdd/BrowserDriver.php';
require_once 'PhpBdd/Debug/FileFactory.php';
require_once 'PhpBdd/Debug/SaveAndOpenPage.php';
require_once 'PhpBdd/Steps.php';


class VisitSteps extends PhpBdd_Steps {

  public function beforeAll(){
    $this->driver = $this->setupDriver();
    // $this->save_and_open_page = new PhpBdd_Support_SaveAndOpenPage($this);
  }
  
  public function afterAll(){
    if($this->driver){
      $this->driver->close();
    }
  }
  
  public function setupDriver(){
		$webdriver = PhpBdd_BrowserDriver::getInstance()->createDriver();
   	$webdriver->connect("firefox");
   	return $webdriver;
  }
 
  /**
   * Given /^I am at "([^"]*)"$/
   **/
  public function stepIamAt($url){
    $this->driver->get($url);
    // $this->save_and_open_page->saveAndOpenPage();
  }
  
  /**
   * Given /^I have entered "([^"]*)" in "([^"]*)"$/
   */
  public function stepIHaveEntered($value, $input_title){
    $webdriver = $this->driver;
    $element = $this->findByCss("input[title='{$input_title}']");
     
    $element->sendKeys(array($value));
  }
  
  /**
  * Given /^I submit "([^"]*)"$/
  **/
  public function stepISubmit($field){
    $element = $this->findByCss("button[value='{$field}']");
    $element->click();
  }
  
  /**
   * Then /^I should see "([^"]*)"$/
   */
  public function stepIShouldSee($needle){
    $element = $this->findByCss('body');

    $haystack = $element->getText();
    self::assertTrue((strpos($haystack, $needle) !== false));
  }

	/**
	* Then /^a screenshot "([^"]*)" will be saved$/
	**/
	public function stepThenAScreenshotWillBeSaved($name){
		$this->driver->getScreenshotAndSaveToFile($name);
	}
  
  protected function findByCss($css){
    return $this->driver->findElementBy(LocatorStrategy::cssSelector, $css);
  }
  
  
}

?>
