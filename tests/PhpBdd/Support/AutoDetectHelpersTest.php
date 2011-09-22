<?php

class PhpBdd_Support_AutoDetectHelpersTest extends PhpBdd_TestCase {


  public function setUp(){
    $this->factoryPath = array(
      array(
        'namespace' => 'DontHaveNamespace_',
        'path' => dirname(__FILE__) . '/helpers'
      )
    );

    $this->getHelpers()->clearHelpers();
  }

  public function tearDown(){
    $this->getHelpers()->clearHelpers();
    $this->getInst()->clearPaths();
  }

  public function getHelpers(){
    return PhpBdd_Support_Helpers::getInstance();
  }

  public function getInst(){
    return PhpBdd_Support_AutoDetectHelpers::getInstance();
  }

  public function addPath(){
    $inst = $this->getInst();

    $inst->addPath(
      'DontHaveNamespace_',
      dirname(__FILE__) . '/helpers'
    );
  }

  public function testGetInstance(){
    $this->assertSame($this->getInst(), $this->getInst());
  }

  public function testAddPath(){
    $inst = $this->getInst();
    $this->addPath();

    $this->assertContains(
      $this->factoryPath[0],
      $inst->paths
    );
  }

  public function testGetPaths(){
    $this->addPath();

    $this->assertEquals(
      $this->factoryPath, 
      $this->getInst()->getPaths()
    );
  }

  public function testClearPaths(){
    $this->testAddPath();
    $inst = $this->getInst();

    $inst->clearPaths();

    $this->assertEquals(count($inst->getPaths()), 0);
  }

  public function testGetHelperInstance(){
    $this->assertSame(
      $this->getInst()->getHelperInstance(),
      $this->getHelpers()
    );
  }


  public function testDetectHelpers(){
    $this->addPath();
    $this->getInst()->detectHelpers();

    $helpers = $this->getHelpers();
    

    $this->assertEquals(
      'DontHaveNamespace_TestMe',
      $helpers->getHelper('TestMe')
    );

    $this->assertEquals(
      'DontHaveNamespace_OtherTest',
      $helpers->getHelper('OtherTest')
    );

  }

}

?>
