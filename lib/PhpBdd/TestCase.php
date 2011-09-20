<?php

class PhpBdd_TestCase extends PHPUnit_Framework_TestCase {

  protected $mockDriver;

  public function mockDriver(){
    if(!$this->mockDriver){
      $this->mock_driver = $this->getMock('WebDriver', null, array('host', '4444'));
    } else {
      return $this->mockDriver;
    }
  }

  public function getStep(){
    $globals = array('driver' => $this->mockDriver());
    return new CucumberSteps($globals);
  }

}

?>
