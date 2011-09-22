<?php


class PhpBdd_Support_AutoDetectHelpers {


  static public $_instance;
  public $paths = array();
  
  public function getInstance(){
    if(!self::$_instance){
      $class = __CLASS__;
      self::$_instance = new $class;
    }
    
    return self::$_instance;
    
  }

  /*
   * Adds path/namespace combination to detect.
   *
   * @param string $namespace Namespace classes in folder belong to (PhpBdd_Helper_)
   * @param string $path Directory structure to search within
   * @return void
   */
  public function addPath($namespace, $path){
    $this->paths[] = array(
      'namespace' => $namespace,
      'path' => $path
    );
  }

  /*
   * Returns the array of path/namespace elements
   *
   * <code>
   *    array(
   *      array('namespace' => 'PhpBdd_Helper_', '/path/to/file')
   *    )
   * </code>
   * 
   *
   * @return array Returns an array of arrays with namespace/path info see above
   */
  public function getPaths(){
    return $this->paths;
  }

  /*
   * Clears all paths
   *
   * @return void
   */
  public function clearPaths(){
    $this->paths = array();
  }


  /**
   * Detects helpers in paths added to instance
   * and adds aliases to the Helper instance
   *
   * @return void
   **/
  public function detectHelpers(){
    $paths = $this->getPaths();
    $helper = $this->getHelperInstance();

    foreach($paths as $path){
      $directory = $path['path'];
      $namespace = $path['namespace'];
      $glob_path = $directory . '/*.php';

      $classes = glob($glob_path);

      foreach($classes as $classPath){
        $className = str_replace($directory . '/', '', $classPath);
        $className = substr($className, 0, strlen($className) - 4);

        $class = $namespace . $className;
        
        $helper->addHelper($className, $class);
      }
    }
  }


  /**
   *  Returns an instance of the helper class
   *
   * @return PhpBdd_Support_Helpers 
   */
  public function getHelperInstance(){
    return PhpBdd_Support_Helpers::getInstance();
  }




}

?>
