Feature: Happy James
  In order to test my code
  As a front end developer
  I want Selenium and Cucumber to make life easy

  Scenario: Trying to find examples on bing.com
    Given I am at "http://www.bing.com"
    And I wait for the text "Microsoft" to appear
    And I have entered "selenium" in "q"
    And I submit "Search"
    And I wait for the text "RESULTS" to appear
    Then I should see "docs.seleniumhq.org"
    And a screenshot "bing-proof.png" will be saved

  Scenario: Trying to find examples on yahoo.com
    Given I am at "http://search.yahoo.com"
    And I wait for the text "Trending Searches" to appear
    And I have entered "selenium" in "p"
    And I submit "Search"
    And I wait for the text "results" to appear
    Then I should see "docs.seleniumhq.org"
    And a screenshot "yahoo-proof.png" will be saved
