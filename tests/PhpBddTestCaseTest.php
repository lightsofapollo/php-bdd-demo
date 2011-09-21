<?php

// Maybe I should not actually test class with itself....?
class PhpBdd_TestCaseTest extends PhpBdd_TestCase {

  public function tearDown(){
    $this->mockDriver = null;
  }

  public function testMockDriver(){
    $this->assertEquals($this->mockDriver, null);

    $driver = $this->mockDriver();
    $this->assertSame($this->mockDriver, $driver);

    $parentClass = get_parent_class($driver);

    $this->assertEquals($parentClass, 'WebDriver');
  }


  public function testGetStep(){
    $mock = $this->mockDriver();
    $step = $this->getStep();

    $this->assertInstanceOf('CucumberSteps', $step);
    $this->assertSame($mock, $step->driver);
  }
}


?>
