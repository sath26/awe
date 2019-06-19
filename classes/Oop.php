<?php

class Oop {
    private $id;
    private $name;
    private $email;
    // Constructor
    public function __construct($id, $name,$email) {
       $this->id=$id;
       $this->name=$name;
       $this->email=$email;
    }

    
    public function getName() {
        return $this->name;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getId() {
        return $this->id;
    }

}
?>