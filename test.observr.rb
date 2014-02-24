def run_behat()
  command = "bin/behat --verbose --profile headless --time"
  puts "Executing: #{command}"
  system(command)
end

def run_phpunit(file)
  command = "bin/phpunit #{File.dirname(__FILE__)}/#{file}"

  puts "Executing: #{command}"
  system(command)
end

######### functional ########

watch( 'tests/functional(/.*?)/*\.*' )  {   system("clear") && run_behat() }

######### unit ########

watch( 'tests/unit/.*Test\.php' )  { |md|
     system("clear") && run_phpunit(md[0])
}

watch( 'src/(.*)\.php' )  { |md|
    system("clear") && run_phpunit("tests/unit/#{md[1]}Test.php") && run_behat()
}
watch( 'tests/unit/test_helper.php' ) {
    system("clear") && run_phpunit('tests/unit') && run_behat()
}

