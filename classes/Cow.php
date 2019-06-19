<?php 
class Cow extends Animal  { //inherits an the abstract parent class

  private $milk_yield;


 public function __construct ($breed,$milk_yield) {

  parent::__construct($breed);  //passing appropriate parameters onto parent

  $this->milk_yield = $milk_yield;

  }

  //This method MUST be implement - as it is an abstract method in parent class

  public function getNoise() {

  return "Mooo....";

  } 

  

  public function getMilkYield(){

  return $this->milk_yield;

  }

  

  public function setMilkYield($yield){

  $this->milk_yield = $yield;

  }

  } //End of class


?>