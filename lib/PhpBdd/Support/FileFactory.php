<?php

class PhpBdd_Support_FileFactory {

  static public $lastGeneratedTmpFileName;


  /*
   * Generates a path based on the project root
   * You can pass additional params to append to root
   *
   * @param string $path,...
   * @return string Root path + given paths root/given/path
   */
  static public function getPath(){
    $args = func_get_args();

    if(isset($args[0]) && is_array($args[0])){
      $args = $args[0];
    }

    $root = dirname(dirname(dirname(dirname(__FILE__))));


    if(!isset($args[0])){
      return $root;
    }

    return $root. '/' . implode('/', $args);
  }
  
  /*
   * Generates a temporary file name for application to use elswhere
   * Full path given takes same params as getPath with the addition of
   * the file ext as the last parater
   *
   * <code>
   * <?php
   *
   *  PhpBdd_Support_FileFactory::genTmpFileName('debug', 'screenshot', 'suffix.png');
   *  // => ROOT . 'debug/screenshot/randomly_generated_suffix.png';
   * ?>
   * </code>
   *
   * @param string $path,...
   * @param string $ext extension for file name
   * @return string Full path to filename
   */
  static public function genTmpFileName(){
    $args = func_get_args();
    if(isset($args[0]) && is_array($args[0])){
      $args = $args[0];
    }

    $extension = array_pop($args);
    $path = PhpBdd_Support_FileFactory::getPath($args);

    $random = time() . '_' . rand(0, 10) . rand(100, 999);

    self::$lastGeneratedTmpFileName = $path . '/' . $random . $extension;

    return self::$lastGeneratedTmpFileName;
  }

}

?>
