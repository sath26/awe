<?php 
class Dog extends Animal {


 private $name;


 public function __construct($breed, $name) {

  parent::__construct($breed);

  //passing appropriate parameters onto parent	  // parent::__construct($weight);

  $this -> name = $name;

  }


 public function getName() {

  return $this -> name;

  }


 public function getNoise() {

  return "Woof Woof";

  }

  } //End of class


?>