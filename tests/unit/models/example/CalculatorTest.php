<?php

use Models\Example\Calculator;

class CalculatorTest extends PHPUnit_Framework_TestCase {

    public function setup() {
        $this->calculator = new Calculator();
    }

    public function testCanGetDefaultResult()
    {
        $this->assertSame(0, $this->calculator->getResult());
    }

    public function testAddAltersResult()
    {
        $values = [
            [1, 1],
            [2.1, 3.1],
            [3, 6.1],
            [-7, -0.9]
        ];
        foreach($values as $valueSet) {
            $this->calculator->add($valueSet[0]);
            $this->assertSame($valueSet[1], $this->calculator->getResult());
        }
    }

    public function testMultiplyAltersResult()
    {
        // initialize the add to 1
        $this->calculator->add(1);
        $values = [
            [3, 3],
            [-4.1, -12.3],
            [0, 0]
        ];
        foreach($values as $valueSet) {
            $this->calculator->multiply($valueSet[0]);
            $this->assertEquals($valueSet[1], $this->calculator->getResult());
        }
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testAddsResultsIntegerInput()
    {
        $this->calculator->add(array());
        $this->fail("Should not execute");
    }
}