<?php

/* Base Class For Browser Driver for our demos */

class PhpBdd_BrowserDriver {
	
	protected $grid_host;
	protected $grid_port;
	
	private static $_instance = null;
	
	public static function getInstance(){
		if(!self::$_instance){
			self::$_instance = new PhpBdd_BrowserDriver();
		}
		
		return self::$_instance;
	}
	
	public function __construct(){
		$this->grid_host = $this->getGridHost();
		$this->grid_port = $this->getGridPort();
	}
	
	public function getGridHost(){
		if(!$this->grid_host){
			$env = getenv('SELENIUM_GRID_HOST');
			if($env){
				$this->grid_host = $env;
			} else {
				$this->grid_host = 'localhost';
			}
		}
		return $this->grid_host;
	}	
	
	public function getGridPort(){
		if(!$this->grid_port){
			$env = getenv('SELENIUM_GRID_PORT');
			if($env){
				$this->grid_port = $env;
			} else {
				$this->grid_port = '4444';
			}
		}
		return $this->grid_port;
	}
	
	public function createDriver(){
		return new WebDriver($this->grid_host, $this->grid_port);
	}
	
}

?>