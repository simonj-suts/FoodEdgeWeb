<?php
	// database connection and table name
	class userInformation
	{
		private $conn;
		private $tableName="userinformation";
		
		//
		private $c_id;
		private $f_name;
		private $l_name;
		private $c_email;
		private $c_password;
		private $c_pnumber;
		private $s_question;
		private $s_answer;
		
		public function __construct($db){
			$this->conn = $db;
		}
		
		public function sanitise_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		public function setCustomerFirstName($f_name){
			$valid = false;
			if (preg_match("/^[a-zA-Z]+$/",$f_name)){
				$this->f_name = $f_name;
				$valid = true;
			}
			return $valid;
		}
		
		public function getCustomerFirstName(){
			return $this->f_name;
		}
		
		public function setCustomerLastName($l_name){
			$valid = false;
			if (preg_match("/^[a-zA-Z]+$/",$l_name)){
				$this->l_name = $l_name;
				$valid = true;
			}
			return $valid;
		}
		
		public function getCustomerLastName(){
			return $this->l_name;
		}
		
		public function setEmail($c_email){
			$valid = false;
			if(filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
				$this->c_email = $c_email;
				$valid = true;
			}
			return $valid;
		}
		
		public function getEmail(){
			return $this->c_email;
		}
		
		public function setPassword($c_password){
			$this->c_password = $c_password;

		}
		
		public function getPassword(){
			return $this->c_password;
		}
		
		public function setPhoneNo($c_pnumber){
			$valid = false;
			if (preg_match("/^[0-9]+$/",$c_pnumber)) {
				$this->c_pnumber = $c_pnumber;
				$valid = true;
			}
			return $valid;
		}
		
		public function getPhoneNo(){
			return $this->c_pnumber;
		}
		
		public function setSecQuestion($s_question){
			$this->s_question = $s_question;
		}
		
		public function getSecQuestion(){
			return $this->s_question;
		}

		public function setSecAnswer($s_answer){
			$valid = false;
			if (preg_match("/^[a-zA-Z]+$/",$s_answer)){
				$this->s_answer = $s_answer;
				$valid = true;
			}
			return $valid;
		}
		
		public function getSecAnswer(){
			return $this->s_answer;
		}
		
		public function read(){
			$rows = [];
			
			$query = "SELECT * FROM ".$this->tableName." ORDER BY CustomerID";
			$result = @mysqli_query($this->conn, $query);
			
			while($row = mysqli_fetch_assoc($result)){
				$rows[] = $row;
			}
			return $rows;
		}
		
		// add new order
		public function createOrder(){
			$f_name = $this->f_name;
			$l_name = $this->l_name;
			$c_email = $this->c_email;
			$c_password = $this->c_password;
			$c_pnumber = $this->c_pnumber;
			$s_question = $this->s_question;
			$s_answer = $this->s_answer;
			$query = "
					INSERT INTO ".$this->tableName."(CustomerFName, CustomerLName, Email, Password, PhoneNo, SecQuestion, SecAnswer) 
					VALUES ('$f_name', '$l_name', '$c_email', '$c_password', '$c_pnumber', '$s_question', '$s_answer')";
			
			if (mysqli_query($this->conn, $query)){
			  echo "New record created successfully";
			}
			else{
			  echo "Error: " . $query. "<br>" . mysqli_error($this->conn);
			}
		}
	}
	
?>