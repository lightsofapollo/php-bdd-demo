<?php

use \Models\Example;
use \Mockery as m;

class CalculatorButtonPusherTest extends PHPUnit_Framework_TestCase {

    public function setup() {
    }

    public function tearDown() {
        // Mockery requires this
        \Mockery::close();
    }

    public function testAddAndMultiplyShouldCallBothMethods()
    {
        // test methods are being called
        $service = m::mock('Calculator');
        $service->shouldReceive('add')->times(1)->with(1.5)->ordered();
        $service->shouldReceive('multiply')->times(1)->with(1.5)->ordered();

        // inject dependency
        $this->calculatorButtonPusher = new CalculatorButtonPusher($service);
        $this->calculatorButtonPusher->addAndMultiply(1.5);

        // this particular test doesn't run assertions except for what the mocks are doing (getting their methods called)
        $this->assertTrue(true);
    }

    public function testGetCalculatorShouldReturnACalculator()
    {
        $calculator = new Calculator;
        $this->calculatorButtonPusher = new CalculatorButtonPusher($calculator);
        $this->assertSame($calculator, $this->calculatorButtonPusher->getCalculator());
    }

}