<?php

class CalculatorButtonPusher {

    public function __construct(Calculator $calculator) {
        $this->calculator = $calculator;
    }

    public function addAndMultiply($value) {
        // this method is to demonstrate mocking
        $this->calculator->add($value);
        $this->calculator->multiply($value);
    }

    public function getCalculator() {
        return $this->calculator;
    }
}