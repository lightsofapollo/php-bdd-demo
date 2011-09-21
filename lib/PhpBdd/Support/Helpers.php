<?php


/*
 * Class supports adding aliases to classes and easy
 * initialization of "Helpers" via their alias.
 *
 * <code>
 *    // Get Instance
 *    $helpers = PhpBdd_Support_Helpers->getInstance();
 *
 *    // Add helper alias
 *    $helpers->addHelperClass('saveAndOpenPage', 'PhpBdd_Support_SaveAndOpenPage');
 *
 *    // Construct helper with arguments for constructor
 *    $helpers->initializeHelper('saveAndOpenPage', $constructorArgs);
 *    # => new PhpBdd_Support_SaveAndOpenPage($constructorArgs);
 *
 *
 *    // Get a list of all available helpers
 *    $helpers->helperList();
 *    # => array('saveAndOpenPage' => 'PhpBdd_Support_SaveAndOpenPage')
 *
 *
 *   // Does a helper alias exist? 
 *   $helpers->hasHelper('saveAndOpenPage');
 *   # => true
 *
 *   // Clear all helper aliases
 *   $helpers->clearHelperClasses();
 *   $helpers->helperList();
 *   # => array()
 *
 *
 * </code>
 */
class PhpBdd_Support_Helpers {

  static public $_instance;

  /* List of aliases */
  protected $helperAliases;

  static public function getInstance(){
    if(!self::$_instance){
      self::$_instance = new PhpBdd_Support_Helpers();
    }
    return self::$_instance;
  }

  /*
   * Creates a helper instance from name and constructor args.
   *
   * If an argument is given it will be passed to the constructor.
   * Only one argument will be passed. If given an array that array
   * will be passed as first argument to constructor.
   *
   *
   *
   * @param string $name Name of saved helper
   * @param string|array $constructArg argument for helper constructor
   * @return mixed Helper instance constructed with $constructArgs
   */
  public function initializeHelper($name, $constructArg = null){
    $class = $this->getHelperClass($name);
    if($class){
      if($constructArg !== null){
        return new $class($constructArg);
      } else {
        return new $class;
      }
    }
  }

  /* 
   * Returns a list of all available alias -> class combinations
   *
   * @return array An array of alias => Class
   */
  public function getHelperAliases(){
    return $this->helperAliases;
  }

  /* 
   * Returns true when helper alias exists
   * 
   * @param string $name Name of helper alias
   * @return boolean
   */
  public function hasHelper($name){
    return isset($this->helperAliases[$name]);
  }

  /*
   * Returns class of given alias
   *
   * @param string $name helper alias
   * @return string class of given alias
   */
  public function getHelperClass($name){
    if($this->hasHelper($name)){
      return $this->helperAliases[$name];
    }
  }

  /*
   * Adds class to available helper aliases
   * If an existing alias name is in list it is overriden.
   *   *
   * @param string $class Name of helper class
   * @param string $alias Name which helper is referenced
   */
  public function addHelperClass($alias, $class){
    $this->helperAliases[$alias] = $class;
  }


  /*
   * Removes all helper aliases from list
   */
  public function clearHelperClasses(){
    $this->helperAliases = array();
  }

}

?>
