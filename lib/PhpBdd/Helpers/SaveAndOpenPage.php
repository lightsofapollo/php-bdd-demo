<?php

class PhpBdd_Helpers_SaveAndOpenPage {

  protected $step;
  protected $lastGeneratedFile;

  public $suppressOpen = false;

  public function __construct($step){
    $this->step = $step;
  }

  public function getStep(){
    return $this->step;
  }

  public function saveAndOpenPage(){
    $source = $this->step->driver->getPageSource();
    $file = PhpBdd_Support_FileFactory::genTmpFileName('debug', 'source', '.html');

    $handle = fopen($file, 'w');
    fwrite($handle, $source);
    fclose($handle);

    if(!$this->suppressOpen){
      $open = `which open`;
      if(strpos($open, '/usr/bin/') !== false){
        `open $file`;
      }
    }
  }



}

