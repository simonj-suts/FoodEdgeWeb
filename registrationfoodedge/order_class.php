<?php
	/* ORDER CLASS 
	Author: Simon Jingga
	Date: 5 October 2020
	Validated Ok: 
	*/
	
class Order{
	// database connection and table name
	private $conn;
	private $tableName="orders";
	
	// order fields
	private $o_id;
	private $c_id;
	private $o_date;
	private $o_status;
	private $occasion;
	private $p_id;
	private $address;
	private $o_eventTime;
	private $o_eventDate;
	
	// CONSTRUCTOR
	public function __construct($db){
		$this->conn = $db;
	}
	
	// sanitnise inputs
	private function sanitise_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data
	}
	
	// validate and set OrderID
	public function setOrderID($id){
		$id = sanitise_input($id);
		$valid = false;
		
		if (preg_match("/^[0-9]+$/",$id)) {
			$this->o_id=$id;
			$valid = true;
		}
		
		return $valid;
	}
	
	// validate and set CustomerID
	public function setCustomerID($id){
		$id = sanitise_input($id);
		$valid = false;
		
		if (preg_match("/^[0-9]+$/",$id)) {
			
			// check if customer id exists
			$query = "SELECT CustomerID FROM userinformation";
			$result = @mysqli_query($conn,$query);
			
			while($row = mysqli_fetch_assoc($result)){
				if ($row['CustomerID']==$id){
					$this->o_id=$id;
					$valid = true;
					break;
				}
			}
		}
		
		return $valid;
	}
	
	// validate and set order date
	public function setOrderDate($date){
		$valid = false;
		
		// DD/MM/YYYY format
		if (preg_match("/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/g",$date)){
			$this->o_date = $date;
			$valid = true;
		}
		
		return $valid;
	}
	
	// validate and set order status
	public function setOrderStatus($status){
		$status = sanitise_input($status);
		$status = strtolower($status);
		$valid = false;
		
		if (preg_match("/^[a-zA-Z]+$/",$status)) {
			if ($status=="pending" || $status=="delivered" || $status=="rejected"){
				$this->o_status = $status;
				$valid = true;
			}
		}
		
		return $valid;
	}
	
	// validate and set occasion
	public function setOccasion($occ){
		$occ = sanitise_input($occ);
		$occ = strtolower($occ);
		$valid = false;
		
		if (preg_match("/^[a-zA-Z]+$/",$status)) {
			$this->occasion = $occ;
			$valid = true;
		}
		
		return $valid;
	}
	
	// validate and set PackageID
	public function setPackageID($id){
		$id = sanitise_input($id);
		$valid = false;
		
		if (preg_match("/^[0-9]+$/",$id)) {
			// check if package id exists
			$query = "SELECT package_id FROM userinformation";
			$result = @mysqli_query($conn,$query);
			
			while($row = mysqli_fetch_assoc($result)){
				if ($row['package_id']==$id){
					$this->o_id=$id;
					$valid = true;
					break;
				}
			}
		}
		
		return $valid;
	}
	
	// validate and set address
	public function setAddress($addr){
		$valid = false;
		
		if (preg_match("/^[a-zA-Z]+$/",$status)) {
			$this->occasion = $occ;
			$valid = true;
		}
		
		return $valid;
	}
	
	// validate and set event time
	public function setEventTime($time){
		$valid = false;
		
		// 24-hour format
		if (preg_match("([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?",$time)){
			$this->o_eventTime = $time;
		}
		
		return $valid;
	}
	
	// validate and set event date
	public function setEventDate($date){
		$valid = false;
		
		// DD/MM/YYYY format
		if (preg_match("/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/g",$date)){
			$this->o_eventDate = $date;
			$valid = true;
		}
		
		return $valid;
	}
	
	// retrieve all rows in the form of array
	public function read(){
		$rows = [];
		
		$query = "SELECT * FROM".$this->tableName."ORDER BY order_date";
		$result = @mysqli_query($conn,$query);
		
		while($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}
		
		return $rows;
	}
	
	// add new order
	public function createOrder(){
		$query = "INSERT INTO 
					".$this->tableName."(CustomerID,order_date,order_status,occasion,package_id,address,event_time,event_date)
				VALUES
					('$c_id','$o_date','$o_status','$occ','$p_id','$address','$o_eventTime','$o_eventDate')";
					
		@mysqli_query($conn,$query) or die("Unable to insert new order");
	}
}
?>