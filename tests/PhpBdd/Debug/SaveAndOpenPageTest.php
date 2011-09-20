<?php

class PhpBdd_Debug_SaveAndOpenPageTest extends PhpBdd_TestCase {

  public function createSubject(){
    return PhpBdd_Debug_SaveAndOpenPage($this->getStep());
  }

  public function setUp(){
    $this->step = $this->getStep();
    $this->subject = new PhpBdd_Debug_SaveAndOpenPage($this->step);
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
    $file = PhpBdd_Debug_FileFactory::$lastGeneratedTmpFileName;

    $this->assertFileExists($file);
    $contents = file_get_contents($file);
    $this->assertEquals($expected, $contents);
  }


}


