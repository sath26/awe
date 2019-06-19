<?php 
  //Abstract classes - we cannont create an instance of an Animal

  abstract class Animal {

 private $breed;

  //Available to all subclasses of Animal

  //A Static class attribute. ie - Remains in class (not duplicated in objects created)

  public static $animal_instance_counter;

  //This will be used to count number of animal objects created


 public function __construct($breed) {

  $this -> breed = $breed;

  self::$animal_instance_counter++;

  //increment the number of animals created

  }


 public function getBreed() {

  return $this -> breed;

  }


 //An abstract method. Can only be created in an abstract class. This MUST be implemented by all subclasses - notice there is no body

  public abstract function getNoise() ;


 //A static, class method. Called from class directly

  public static function getAnimalCount() {

  return self::$animal_instance_counter;

  }


}
?>