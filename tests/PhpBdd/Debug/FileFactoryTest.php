<?php

class PhpBdd_Debug_FileFactoryTest extends PhpBdd_TestCase {


  public function testGetPath(){
    $this->assertEquals(PHP_BDD_ROOT, PhpBdd_Debug_FileFactory::getPath());
  }

  public function testGetPathWithExtraPaths(){
    $given = PhpBdd_Debug_FileFactory::getPath('debug', 'screenshot', 'wow');

    $this->assertEquals(PhpBdd_Debug_FileFactory::getPath() . '/debug/screenshot/wow', $given);
  }

  public function testGetPathWithExtraPathsAsArray(){
    $given = PhpBdd_Debug_FileFactory::getPath(array('debug', 'screenshot', 'wow'));

    $this->assertEquals(PhpBdd_Debug_FileFactory::getPath() . '/debug/screenshot/wow', $given);
  }
  

  public function testGenTmpFileName(){
    PhpBdd_Debug_FileFactory::$lastGeneratedTmpFileName = null;

    $result = PhpBdd_Debug_FileFactory::genTmpFileName('file', 'path', '.png');
    $len = strlen($result);

    $this->assertGreaterThan(10, $len);

    $includes = 'file/path/';

    $this->assertContains($includes, $result);
    $this->assertContains('.png', $result);

    $this->assertEquals($result, PhpBdd_Debug_FileFactory::$lastGeneratedTmpFileName);

  }

}

?>
