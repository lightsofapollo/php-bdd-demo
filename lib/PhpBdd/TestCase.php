<?php

class PhpBdd_TestCase extends PHPUnit_Framework_TestCase {

  protected $mockDriver;

  public function mockDriver(){
    if(!$this->mockDriver){
      $stub = $this->getMockBuilder('WebDriver')
                   ->disableOriginalConstructor()
                   ->getMock();

      $this->mockDriver = $stub;
    }

    return $this->mockDriver;
  }

  public function getStep(){
    $globals = array('driver' => $this->mockDriver());
    return new CucumberSteps($globals);
  }

}

?>
