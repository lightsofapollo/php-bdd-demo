# download a demo selenium app
# the next command will create a new folder and place the demo code in it
git clone git@github.com:michikono/php-bdd-demo.git

# (OPTIONAL) if brew has problems, run this next line:
# sudo chown -R $USER /usr/local/Cellar/

# install composer
xcode-select --install
brew tap josegonzalez/homebrew-php
brew install josegonzalez/php/composer

# update composer (if you already have it)
composer self-update

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

# install rvm and ruby
\curl -sSL https://get.rvm.io | bash
rvm install ruby-2.1.0
rvm reload
bundle install

# setup auto-test functionality
gem install watchr
# event watcher for Linux/BSD
gem install rev
# event watcher for OSX
gem install ruby-fsevent

# navigate into folder
# install dependencies PHPUnit and PHPUnit_Selenium
composer install --dev
# or composer update --update

# In a new tab: run the selenium grid script
./bin/selenium-hub.sh

# In another tab:
./bin/selenium-webdriver.sh

# turn on auto test-running (runs headless behat tests + phpunit tests)
observr ./test.observr.rb

# Run phpunit tests manually
# phpunit
# Run behat tests manually
# ./bin/behat --verbose --profile headless
# or for the full browser test manually
# ./bin/behat --verbose

