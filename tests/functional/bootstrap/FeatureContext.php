<?php
use Behat\Behat\Context\BehatContext;
use Behat\MinkExtension\Context\MinkDictionary;

require 'vendor/autoload.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    use MinkDictionary;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @BeforeScenario
     */
    public function beforeEach($event){
    }

    /**
     * @AfterScenario
     */
    public function afterEach($event){
    }

    /**
     * @Given /^I am at "([^"]*)"$/
     **/
    public function IamAt($url){
        $this->getSession()->visit($url);
    }

    /**
     * @Given /^I have entered "([^"]*)" in "([^"]*)"$/
     */
    public function IHaveEntered($value, $input){
        $this->fillField($input, $value);
    }

    /**
     * @Given /^I submit "([^"]*)"$/
     **/
    public function ISubmit($field){
        $this->pressButton($field);
    }

    /**
     * @Then /^I wait for the text "([^"]*)" to appear$/
     *
     */
    public function iWaitForText($text)
    {
        try {
            $text = $this->fixStepArgument($text);
            $this->getSession()->wait(5000, "document.body.innerText.search('$text') >= 0");
        } catch( Behat\Mink\Exception\UnsupportedDriverActionException $ignore) {
            // ignore this for headless
        }
    }


    /**
     * @AfterScenario
     **/
    public function takeScreenShot($event){
        try {
            if(get_class($event) == 'Behat\Behat\Event\ScenarioEvent') {
                $data = $this->getSession()->getDriver()->getScreenshot();
                file_put_contents("debug/screenshots/{$event->getScenario()->getTitle()}.png", $data);
            }
        } catch( Behat\Mink\Exception\UnsupportedDriverActionException $ignore) {
            // ignore this for headless
        }
    }

    /**
     * @Given /^a screenshot "([^"]*)" will be saved$/
     */
    public function aScreenshotWillBeSaved($arg1)
    {
        // only here for backwards compatibility; behat would just delete this step and auto save at the end of all ui-specs
    }


    protected function findByCss($css){
        return $this->getSession()->getPage()->find('css', $css);
    }


}
