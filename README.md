# download a demo selenium app
# the next command will create a new folder and place the demo code in it
git clone git@github.com:michikono/php-bdd-demo.git

# (OPTIONAL) if brew has problems, run this next line:
# sudo chown -R $USER /usr/local/Cellar/

# install composer
xcode-select --install
brew tap josegonzalez/homebrew-php
brew install josegonzalez/php/composer

# install PHP55
brew tap homebrew/dupes
brew tap josegonzalez/homebrew-php
brew install php55

# the previous step will tell you HOW to update your CLI path, which is also outlined below!
#
# edit your ~/.bashrc file:
# ====== start .bashrc file ======
# Swapping from PHP53 to PHP54
# export PATH="$(brew --prefix josegonzalez/php/php53)/bin:$PATH"
export PATH="$(brew --prefix josegonzalez/php/php54)/bin:$PATH"
# ======= end .bashrc file =======

# update your paths
source ~/.bashrc 

# The next steps are from: https://github.com/lightsofapollo/php-bdd-demo

# install rvm and ruby
\curl -sSL https://get.rvm.io | bash
rvm install ruby-2.1.0
rvm reload
bundle install

# navigate into folder
# install dependencies PHPUnit and PHPUnit_Selenium
composer install
# or composer update

# In a new tab: run the selenium grid script
./bin/selenium-hub.sh

# In another tab:
./bin/selenium-webdriver.sh

# OR behat tests
bin/behat --verbose --profile headless
bin/behat --verbose 

