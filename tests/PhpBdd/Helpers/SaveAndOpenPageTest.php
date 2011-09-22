<?php

class PhpBdd_Helpers_SaveAndOpenPageTest extends PhpBdd_TestCase {

  public function createSubject(){
    return PhpBdd_Helpers_SaveAndOpenPage($this->getStep());
  }

  public function setUp(){
    $this->step = $this->getStep();
    $this->subject = new PhpBdd_Support_SaveAndOpenPage($this->step);
    $this->subject->suppressOpen = true;
  }

  public function testConstruct(){
    $this->assertSame($this->step, $this->subject->getStep());
  }

  public function testSaveAndOpenPage(){
    $mock = $this->mockDriver();
    $expected = 'source of file';

    $mock->expects($this->any())
      ->method('getPageSource')
      ->will($this->returnValue($expected));


    $this->subject->saveAndOpenPage();
    $file = PhpBdd_Support_FileFactory::$lastGeneratedTmpFileName;

    $this->assertFileExists($file);
    $contents = file_get_contents($file);
    $this->assertEquals($expected, $contents);
  }


}


