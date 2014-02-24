<?php

namespace Example;

class CalculatorTest extends \PHPUnit_Framework_TestCase {


    public function testCanGetDefaultResult()
    {
        // Arrange
        $calculator = new Calculator();
        // Assert
        $this->assertSame(0, $calculator->getResult());
    }
}