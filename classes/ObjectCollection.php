<?php 
 class ObjectCollection  
{  
	//This is an array to hold line items
	public $items_array ;
	
	public $itemCounter; //Count the number of items
 
	public function __construct() {
	    //Create an array object to hold line items
	    $this->items_array = array();
		$this->itemCounter=0; 
	 }
	
	public function getItemCount(){
		return $this->itemCounter;
	}  
	

	// This will add a new line object to line items array
	public function addItem($item) {
	   $this->itemCounter++;
	   $this->items_array[] = $item;
	}
	
	public function getItems($x){
		return $this->items_array[$x];
	}
	
}
