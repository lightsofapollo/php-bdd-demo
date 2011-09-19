Feature: Happy James
  In order to test my code
  As a front end developer
  I want Selenium and Cucumber to make life easy
  
  Background:
    Given I am at "http://www.yahoo.com"
  
  Scenario: Trying to find examples
    Given I have entered "Selenium" in "Web Search"
    And I submit "Web Search"
    Then I should see "Web Browser Automation"
    Then a screenshot "yahoo-proof.png" will be saved