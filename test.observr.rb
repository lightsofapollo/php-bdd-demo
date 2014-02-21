def run_behat()
  command = "bin/behat --verbose --profile headless --time"
  puts "Executing: #{command}"
  system("clear")
  system(command)
end

watch( 'features(/.*?)/*\.*' )  { run_behat() }
watch( 'lib(/.*?)/*\.php' )  { run_behat() }

watch('test/.*Test\.php') do |md|
  puts "\e[H\e[2J"  #clear console
  system("clear");
  system("phpunit #{md[0]}")
end

watch('lib/(.*)\.php') do |md|   # runs test/Class/* whenever lib/class.php is changed
  puts "\e[H\e[2J"  #clear console
  testpath = md[1].sub(/./) { |s| s.upcase }
  system("clear");
  system("phpunit test/#{testpath}")
end

######### not used ########
def phpunit_default_args
  "--colors -c #{File.dirname(__FILE__)}/tests/phpunit.xml"
end


def run_phpunit(file)
  command = "phpunit #{phpunit_default_args} #{File.dirname(__FILE__)}/#{file}"

  puts "Executing: #{command}"
  system("clear")
  system(command)
end

#watch( 'tests/.*Test\.php' )  {|md| run_phpunit(md[0]) }
#watch( 'lib/(.*)\.php' )  {|md| run_phpunit("tests/#{md[1]}Test.php") }
#watch('tests/test_helper.php') { run_phpunit('tests/') }

