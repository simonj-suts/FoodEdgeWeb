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
		return $data;
	}
	
	// validate and set OrderID
	public function setOrderID($id){
		$id = $this->sanitise_input($id);
		$valid = false;
		
		if (preg_match("/^[0-9]+$/",$id)) {

			// check if order id exists
			$query = "SELECT order_id FROM orders";
			$result = @mysqli_query($this->conn,$query);

			while ($row = mysqli_fetch_assoc($result)){
				if ($row['order_id']==$id){
					$this->o_id=$id;
					$valid = true;
					break;
				}
			}
		}
		return $valid;
	}
	
	// validate and set CustomerID
	public function setCustomerID($id){
		$id = $this->sanitise_input($id);
		$valid = false;
		
		if (preg_match("/^[0-9]+$/",$id)) {
			
			// check if customer id exists
			$query = "SELECT CustomerID FROM userinformation";
			$result = @mysqli_query($this->conn,$query);
			
			while($row = mysqli_fetch_assoc($result)){
				if ($row['CustomerID']==$id){
					$this->c_id=$id;
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
		
		// YYYY/MM/DD format
		if (preg_match("/^(\d{4})-((0[1-9])|(1[0-2]))-(0[1-9]|[12][0-9]|3[01])$/",$date)){
			$this->o_date = $date;
			$valid = true;
		}
		
		return $valid;
	}
	
	// validate and set order status
	public function setOrderStatus($status){
		$status = $this->sanitise_input($status);
		$status = strtolower($status);
		$valid = false;
		
		if (preg_match("/^[a-zA-Z]+$/",$status)) {
			if ($status=="pending" || $status=="delivered"){
				$this->o_status = $status;
				$valid = true;
			}
		}
		
		return $valid;
	}
	
	// validate and set occasion
	public function setOccasion($occ){
		$occ = $this->sanitise_input($occ);
		$occ = strtolower($occ);
		$valid = false;
		
		if (preg_match("/^[a-zA-Z]+$/",$occ)) {
			$this->occasion = $occ;
			$valid = true;
		}
		
		return $valid;
	}
	
	// validate and set PackageID
	public function setPackageID($id){
		$id = $this->sanitise_input($id);
		$valid = false;
		
		if (preg_match("/^[0-9]+$/",$id)) {
			// check if package id exists
			$query = "SELECT package_id FROM package";
			$result = @mysqli_query($this->conn,$query);
			
			while($row = mysqli_fetch_assoc($result)){
				if ($row['package_id']==$id){
					$this->p_id=$id;
					$valid = true;
					break;
				}
			}
		}
		
		return $valid;
	}
	
	// validate and set address
	public function setAddress($addr){
		$this->address = $addr;
		return ;
	}
	
	// validate and set event time
	public function setEventTime($time){
		$valid = false;
		
		// 24-hour format
		if (preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/",$time)){
			$this->o_eventTime = $time;
		}
		
		return $valid;
	}
	
	// validate and set event date
	public function setEventDate($date){
		$valid = false;
		
		// YYYY/MM/DD format
		if (preg_match("/^(\d{4})-((0[1-9])|(1[0-2]))-(0[1-9]|[12][0-9]|3[01])$/",$date)){
			$this->o_eventDate = $date;
			$valid = true;
		}
		
		return $valid;
	}
	
	// retrieve all rows in the form of array
	public function read(){
		$rows = [];
		
		$query = " SELECT * 
				FROM ".$this->tableName." 
				NATURAL JOIN userinformation
				NATURAL JOIN package
				ORDER BY order_date";
		$result = @mysqli_query($this->conn,$query);
		
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
					('$this->c_id','$this->o_date','$this->o_status','$this->occasion','$this->p_id','$this->address','$this->o_eventTime','$this->o_eventDate')";
					
		if (mysqli_query($this->conn, $query)) {
		} else {
			echo "Error: " . $query. "<br>" . mysqli_error($this->conn);
		}
	}
	
	// update an existing order
	public function updateOrder(){
		$query = "UPDATE
					".$this->tableName."
				SET
					CustomerID='$this->c_id',
					order_date='$this->o_date',
					order_status='$this->o_status',
					occasion='$this->occasion',
					package_id='$this->p_id',
					address='$this->address',
					event_time='$this->o_eventTime',
					event_date='$this->o_eventDate'
				WHERE
					order_id='$this->o_id'";

		if (mysqli_query($this->conn, $query)) {
			echo "Successfully update record with OrderID: ".$this->o_id;
		} else {
			echo "Error: " . $query. "<br>" . mysqli_error($this->conn);
		}
	}

	// only update an existing order's status
	public function updateOrderStatus(){
		$query = "UPDATE
					".$this->tableName."
				SET
					order_status='$this->o_status'
				WHERE
					order_id='$this->o_id'";

		if (mysqli_query($this->conn, $query)) {
			echo "Successfully update status with OrderID: ".$this->o_id;
		} else {
			echo "Error: " . $query. "<br>" . mysqli_error($this->conn);
		}
	}
}
?>