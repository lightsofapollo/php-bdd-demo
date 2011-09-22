<?php


class PhpBdd_Support_HelpersTest_MockedHelper {
  public $arguments;

  public function __construct($args){
    $this->arguments = $args;
  }

}

class PhpBdd_Support_HelpersTest extends PhpBdd_TestCase {


  public function getInst(){
    return PhpBdd_Support_Helpers::getInstance();
  }

  public function addHelper(){
    $inst = $this->getInst();
    $inst->addHelper('object', 'stdClass');
  }

  public function testGetInstance(){
    $this->assertInstanceOf('PhpBdd_Support_Helpers', $this->getInst());
    $this->assertSame($this->getInst(), $this->getInst());
  }

  public function setUp(){
    $this->addHelper();
  }

  public function tearDown(){
    $this->getInst()->clearHelpers();
  }

  public function testAddHelper(){
    $inst = $this->getInst();
    $list = $inst->getHelperAliases();

    $this->assertTrue(isset($list['object']), '$inst->getHelperAliases() should contain added alias "object"');
    $this->assertEquals('stdClass', $list['object']);
  }

  public function testHasHelper(){
    $this->assertTrue($this->getInst()->hasHelper('object'), 'should return true when given added "object" helper');
  }

  public function testGetHelper(){
    $inst = $this->getInst();

    $class = $inst->getHelper('object');

    $this->assertEquals('stdClass', $class);
  }

  public function testClearHelpers(){
    $inst = $this->getInst();
    $this->assertTrue($inst->hasHelper('object'), 'should have helper object');

    $inst->clearHelpers();

    $this->assertFalse($inst->hasHelper('object'), 'should have cleared helper "object"');
  }

  public function testInitializeHelperWithoutArgs(){
    $inst = $this->getInst();

    $subject = $inst->initializeHelper('object');

    $this->assertInstanceOf('stdClass', $subject);
  }

  public function testInitializeHelperWithArgs(){
    $inst = $this->getInst();
    $arg = array('driver' => 'object');

    $inst->addHelper('mockDriver', 'PhpBdd_Support_HelpersTest_MockedHelper');
    $helper = $inst->initializeHelper('mockDriver', $arg);

    $this->assertInstanceOf(
      'PhpBdd_Support_HelpersTest_MockedHelper',
      $helper
    );

    $this->assertEquals($arg, $helper->arguments);
  }

}

?>
