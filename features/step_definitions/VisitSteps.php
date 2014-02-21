<?php

require_once "phpwebdriver/WebDriver.php";
require_once "phpwebdriver/LocatorStrategy.php";
require_once 'PhpBdd/BrowserDriver.php';
require_once 'PhpBdd/Support/FileFactory.php';
require_once 'PhpBdd/Helpers/SaveAndOpenPage.php';
require_once 'PhpBdd/Steps.php';


class VisitSteps extends PhpBdd_Steps
{

    public function beforeAll()
    {
        $this->driver = $this->setupDriver();
        $this->save_and_open_page = new PhpBdd_Helpers_SaveAndOpenPage($this);
    }

    public function openIt()
    {
        $this->save_and_open_page->saveAndOpenPage();
    }

    public function afterAll()
    {

        if ($this->driver) {
            $this->driver->close();
        }
    }

    public function setupDriver()
    {
        $webdriver = PhpBdd_BrowserDriver::getInstance()->createDriver();
        $webdriver->connect("firefox");
        return $webdriver;
    }

    /**
     * Given /^I am at "([^"]*)"$/
     **/
    public function stepIamAt($url)
    {
        $this->driver->get($url);
    }

    /**
     * Given /^I have entered "([^"]*)" in "([^"]*)"$/
     */
    public function stepIHaveEntered($value, $input)
    {
        $element = $this->findByCss("input[name='$input'],input[title='$input']");
        $element->sendKeys(array($value));
    }

    /**
     * Given /^I submit "([^"]*)"$/
     **/
    public function stepISubmit($field)
    {
        $element = $this->findByCss("button[value='$field'], button[name='$field'], button[title='$field'], input[value='$field'], input[name='$field'], input[title='$field']");
        $element->click();
    }

    /**
     * Then /^I should see "([^"]*)"$/
     */
    public function stepIShouldSee($needle)
    {
        $element = $this->findByCss('body');

        $haystack = $element->getText();
        self::assertTrue((strpos($haystack, $needle) !== false));
    }

    /**
     * Then /^I wait for the text "([^"]*)" to appear$/
     *
     **/
    public function stepIWaitForTheTextParameterToAppear($text)
    {
        // not necessary for cuke4php
    }


    /**
     * Then /^a screenshot "([^"]*)" will be saved$/
     **/
    public function stepThenAScreenshotWillBeSaved($name)
    {
        $this->driver->getScreenshotAndSaveToFile("debug/screenshots/{$name}");
    }

    protected function findByCss($css)
    {
        return $this->driver->findElementBy(LocatorStrategy::cssSelector, $css);
    }


}

?>
