<?php

class PhpBdd_Debug_SaveAndOpenPage {

  protected $step;
  protected $lastGeneratedFile;

  public function __construct(CucumberSteps $step){
    $this->step = $step;
  }

  public function getStep(){
    return $this->step;
  }

  public function getLastGeneratedFile(){
    return $this->lastGeneratedFile;
  }

  public function generateTemporaryFileName() {
    $this->lastGeneratedFile = time() . '_' . rand(100, 10000) . rand(1, 9);
    return $this->lastGeneratedFile;
  }

}

