Feature: Happy James
  In order to test my code
  As a front end developer
  I want Selenium and Cucumber to make life easy

  Scenario: Trying to find examples on bing.com
    Given I am at "http://www.bing.com"
    And I have entered "Selenium" in "Enter your search term"
    And I submit with name "go"
    Then I should see "Web Browser Automation"
    And a screenshot "bing-proof.png" will be saved  

  Scenario: Trying to find examples on yahoo.com
    Given I am at "http://www.yahoo.com"
    And I have entered "Selenium" in "Web Search"
    And I submit "Web Search"
    Then I should see "Web Browser Automation"
    And a screenshot "yahoo-proof.png" will be saved

