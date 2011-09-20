
def phpunit_default_args
  "--colors -c #{File.dirname(__FILE__)}/tests/phpunit.xml"
end


def run_phpunit(file)
 command = "phpunit #{phpunit_default_args} #{file}"
 
 puts "Executing: #{command}"
 system(command);
end


watch( 'tests/.*Test\.php' )  {|md| run_phpunit(md[0]) }
watch( 'lib/(.*)\.php' )  {|md| run_phpunit("tests/#{md[1]}Test.php") }

