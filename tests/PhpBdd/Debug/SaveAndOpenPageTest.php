<?php

class PhpBdd_Debug_SaveAndOpenPageTest extends PhpBdd_TestCase {

  public function createSubject(){
    return PhpBdd_Debug_SaveAndOpenPage($this->getStep());
  }

  public function setUp(){
    $this->step = $this->getStep();
    $this->subject = new PhpBdd_Debug_SaveAndOpenPage($this->step);
  }

  public function testConstruct(){
    $this->assertEquals($this->step, $this->subject->getStep());
  }

  public function testSaveAndOpenPage(){
    $mock = $this->mockDriver();

    $mock->expects($this->any())
      ->method('getPageSource')
      ->will($this->returnValue('source of file'));

    $this->subject->saveAndOpenPage();
    $file = $this->subject->getLastGeneratedFile();

    $this->assertFileExists($file);
  }

  public function testGenerateTemporryFileName(){
    $len = strlen($this->subject->generateTemporaryFileName());
    $this->assertGreaterThan(10, $len);
    $this->assertNotNull($this->subject->getLastGeneratedFile());

    $expected_path = PHP_BDD_ROOT . '/tmp/';


  }


}


