<?php

namespace Models\Example;

use Symfony\Component\Process\Exception\InvalidArgumentException;

class Calculator {

    private $result = 0;

    public function add($value) {
        if(!is_numeric($value)) {
            throw new \InvalidArgumentException("not an integer");
        }
        $this->result += $value;
    }

    public function multiply($value) {
        if(!is_numeric($value)) {
            throw new \InvalidArgumentException("not an integer");
        }
        $this->result *= $value;
    }

    public function getResult() {
        return $this->result;
    }
}