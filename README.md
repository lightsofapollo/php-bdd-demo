# Purpose

To demo cucumber + selenium combination for php.

# Tools
  - *cucumber* http://cukes.info/
  - *phpwebdriver* http://code.google.com/p/php-webdriver-bindings/
  - *cuke4php* https://github.com/olbrich/cuke4php 
  - *selenium (2.6)* http://code.google.com/p/selenium/wiki/Grid2

# Requirements

- Java
- Ruby 1.8.7 or greater
- PHP 5.2 or greater

# Setup

These steps assume you are running on a mac.
These steps should work fine elsewhere but you need to meet
the requirements. Ruby is required to run cucumber
but does not play a role in the tests themselves.


## 0. Ensure You have PHPUnit ( You probably already have it installed )

Make sure you have PHPUnit installed correctly via pear.
The tests will not be happy without assertions. ensure you
have it setup correctly.

Directions here:

https://github.com/sebastianbergmann/phpunit/

## 1. Install Cuke4PHP

In your local terminal (sudo may be required...)
    
    [sudo] gem install cuke4php

Ensure you can run cuke4php by running the following in your terminal
    
    which cuke4php

This should result in a path. 
Installing cuke with gem adds a binary to your load path.
Read more about this at http://rubygems.org/

### 2. Start Up A Selenium Grid locally

These instructions are a copy from http://code.google.com/p/selenium/wiki/Grid2

Download the latest Selenium Stand Alone server. Link given for conivence this
is not nessasarily the newest version.

http://code.google.com/p/selenium/downloads/detail?name=selenium-server-standalone-2.6.0.jar&can=2&q=

I put this file under ~/bin it can be anywhere you like...

Start the server hub.

    java -jar selenium-server-standalone-2.6.0.jar --role hub

In a new terminal tab/window start the server node (this actually talks to browsers)

    java -jar selenium-server-standalone-2.6.0.jar -role webdriver -hub http://localhost:4444/grid/register -port 5556
    
## Important
If you are on linux you may need the DISPLAY env set to :0 for selenium to run firefox correctly.

    export DISPLAY=:0    

### 3. Download the repository
  
This uses git you can download the tar and decompress it if you like.
  
    git clone git@github.com:lightsofapollo/php-bdd-demo.git

### 4. Run the cukes

From inside php-bdd-demo run the cukes.

    cuke4php features


# Contact Me

If you have a problem you probably know my email.
Otherwise send me something via github...
    

