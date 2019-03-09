<?php
include "Database.php";
class Product extends Database{

	var $id;
	var $productname;
	var $pseudoname;
	//public $image;
	var $price;
	var $date;
	var $weigh;

	 function __construct(){
		// echo "hello";
		// die();
		parent::__construct();
	}


}
?>