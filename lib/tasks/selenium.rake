require 'pp'
require 'sys/proctable'
include Sys

namespace :selenium do
	desc "Start Selenium local hub and node"
	task :start do
		Rake::Task['selenium:start_hub'].invoke
		Rake::Task['selenium:start_webdriver'].invoke
	end

	desc "Stop Selenium local hub and node (sends a HUP)"
	task :stop do
		ProcTable.ps{ |process| 
			if process.cmdline.include? "selenium-server-standalone-2.39.0.jar"
				puts process.pid
				Process.kill("HUP", process.pid)
			end
		}
	end

	task :start_webdriver do
		puts "starting webdriver"
		`java -jar bin/selenium-server-standalone-2.39.0.jar -role webdriver -hub http://localhost:4444/grid/register -port 5556  > /dev/null 2>&1 &`
	end

	task :start_hub do
		puts "starting hub"
		`java -jar bin/selenium-server-standalone-2.39.0.jar -role hub  > /dev/null 2>&1 &`
	end
end