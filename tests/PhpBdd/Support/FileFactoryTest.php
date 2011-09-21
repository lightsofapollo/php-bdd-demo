<?php

class PhpBdd_Support_FileFactoryTest extends PhpBdd_TestCase {


  public function testGetPath(){
    $this->assertEquals(PHP_BDD_ROOT, PhpBdd_Support_FileFactory::getPath());
  }

  public function testGetPathWithExtraPaths(){
    $given = PhpBdd_Support_FileFactory::getPath('debug', 'screenshot', 'wow');

    $this->assertEquals(PhpBdd_Support_FileFactory::getPath() . '/debug/screenshot/wow', $given);
  }

  public function testGetPathWithExtraPathsAsArray(){
    $given = PhpBdd_Support_FileFactory::getPath(array('debug', 'screenshot', 'wow'));

    $this->assertEquals(PhpBdd_Support_FileFactory::getPath() . '/debug/screenshot/wow', $given);
  }
  

  public function testGenTmpFileName(){
    PhpBdd_Support_FileFactory::$lastGeneratedTmpFileName = null;

    $result = PhpBdd_Support_FileFactory::genTmpFileName('file', 'path', '.png');
    $len = strlen($result);

    $this->assertGreaterThan(10, $len);

    $includes = 'file/path/';

    $this->assertContains($includes, $result);
    $this->assertContains('.png', $result);

    $this->assertEquals($result, PhpBdd_Support_FileFactory::$lastGeneratedTmpFileName);

  }

}

?>
