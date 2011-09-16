<?php

require_once "phpwebdriver/WebDriver.php";
require_once "phpwebdriver/LocatorStrategy.php";

class VisitSteps extends CucumberSteps {

  public function beforeAll(){
    $this->driver = $this->setupDriver();
    echo 'BEFORE_ALL';
  }
  
  public function afterAll(){
    if($this->driver){
      $this->driver->close();
    }
  }
  
  public function setupDriver(){
    $webdriver = new WebDriver("localhost", "4444");
    $webdriver->connect("firefox");
    
    return $webdriver;
  }
 
  /**
   * Given /^I am at "([^"]*)"$/
   **/
  public function stepIamAt($url){
    $this->driver->get($url);
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
  
  protected function findByCss($css){
    return $this->driver->findElementBy(LocatorStrategy::cssSelector, $css);
  }
  
  
}

?>