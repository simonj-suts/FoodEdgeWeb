<?php
	/* PACKAGE CLASS 
	Author: Joanna Wong
	Date: 10 October 2020
	Validated Ok: 
	*/
	
class package{
	// database connection and table name
	private $conn;
	private $tableName="package";
	
	// package fields
	private $package_id;
	private $package_name;
	private $package_cuisine;
	private $pax;
	private $price_per_pax;
	private $package_desc;

	
	// CONSTRUCTOR
	public function __construct($db){
		$this->conn = $db;
	}
	
	// sanitise inputs
	private function sanitise_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	
	public function getPackageID(){
			return $this->package_id;
		}
		
		// validate and set package name
	public function setPackageName($name){
			$valid = false;
			if (preg_match("/^[a-zA-Z ]+$/",$name)){
				$this->package_name = $name;
				$valid = true;
			}
			return $valid;
	}
	public function getPackageName(){
		return $this->package_name;
	}
	
	// validate and set package cuisine
	public function setPackageCuisine($cuisine){
		$valid = false;
		
		// YYYY/MM/DD format
		if (preg_match("/^[a-zA-Z]+$/",$cuisine)){
			$this->package_cuisine = $cuisine;
			$valid = true;
		}
		
		return $valid;
	}
	
	public function getPackageCuisine(){
		return $this->package_cuisine;
	}

	
	
	// validate and set pax
	public function setPax($pax){
		$status = $this->sanitise_input($pax);
		
		$valid = false;
		
		if (preg_match("/^[0-9]+$/",$pax)) {
			
			$this->pax = $pax;
			$valid = true;
		
		}
		
		return $valid;
	}
	
	public function getPackage_Pax(){
		return $this->pax;
	}

	
	// validate and set price
	public function setPricePerPax($price){
		$occ = $this->sanitise_input($price);
		
		$valid = false;
		
		if (preg_match("/^\d{1,3}(,?\d{3})*(\.\d{1,2})?$/",$price)) {
			$this->price_per_pax= $price;
			$valid = true;
		}
		
		return $valid;
	}
	
	public function getPackagePricePerPax(){
		return $this->price_per_pax;
	}

	
	// validate and set Package Description
	public function setPackageDesc($desc){
		
		$valid = false;
		
		if ($desc!="") {
			$this->package_desc = $desc;
			$valid=true;
		}
		return $valid;
	}
	
	public function getPackageDesc($desc){
			
		return $this->package_desc;
	}
	
	// retrieve all rows in the form of array
	public function read(){
		
		
		$query = "SELECT * FROM package";
		$result = @mysqli_query($this->conn,$query);
		$rows=[];
		$row=[];
		//$row = mysqli_fetch_assoc($result);
		//echo '<p>Name: '.$row['package_name'].'</p>';
		
		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			array_push($rows,$row);;
		  }
		} 
		else {
			echo "0 results";
		}
		return $rows;
		
	}
	
	//retrieve existing package row
	public function retrievePackage($pkg_id){
		
		$query = "SELECT * FROM package WHERE package_id = '$pkg_id'";
		$result = @mysqli_query($this->conn,$query);
		$row=[];
		
		if ($result->num_rows > 0) {
		  // output data of each row
		  $row = $result->fetch_assoc();
		  
		} 
		else {
			echo "0 results";
		}
		return $row;
		
	}
	
	
	// update an existing package
	public function updatePackage($pkg_id){
		$query = "UPDATE
					".$this->tableName."
				SET
					package_name='$this->package_name',
					package_cuisine='$this->package_cuisine',
					pax='$this->pax',
					price_per_pax='$this->price_per_pax',
					package_desc='$this->package_desc'
					
				WHERE
					package_id='$pkg_id'";

		if (mysqli_query($this->conn, $query)) {
			echo "Successfully update record with PackageID: ".$this->package_id;
		} else {
			echo "Error: " . $query. "<br>" . mysqli_error($this->conn);
		}
	}
	
	
}
?>