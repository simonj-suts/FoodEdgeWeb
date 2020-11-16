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
		private $user_role;
		
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
			if (preg_match("/^[a-zA-Z ]+$/",$f_name)){
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
			if (preg_match("/^[a-zA-Z ]+$/",$l_name)){
				$this->l_name = $l_name;
				$valid = true;
			}
			return $valid;
		}
		
		public function getCustomerID(){
			return $this->c_id;
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
			if (empty($c_password) || strlen($c_password)<=9){
				return false;
			}
			$this->c_password = $c_password;
			return true;
		}
		
		public function getPassword(){
			return $this->c_password;
		}
		
		public function setPhoneNo($c_pnumber){
			$valid = false;
			if (preg_match("/^[0-9]{9}$/",$c_pnumber)) {
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
			$this->s_answer = $s_answer;
		}
		
		public function getSecAnswer(){
			return $this->s_answer;
		}
		
		public function currentConnection(){
			return $this->conn;
		}

		public function getUserRole(){
			return $this->user_role;
		}
		
		
		public function read(){
			$rows = [];
			
			$query = "SELECT * FROM ".$this->tableName." ORDER BY CustomerID";
			$result = @mysqli_query($this->conn, $query);
			
			
			
			if(mysqli_num_rows($result) > 0){
					echo "<table>";
					echo "<tr>";
						echo "<th>first_name</th>";
						echo "<th>last_name</th>";
					echo "</tr>";
				while($row = mysqli_fetch_array($result)){
					echo "<tr>";
						echo "<td>" . $row['CustomerFName'] . "</td>";
						echo "<td>" . $row['CustomerLName'] . "</td>";
					echo "</tr>";
				}
				
			//return $rows;
			}
		
		}
		
		public function getCurrentUser($userID){
			$userData = null;
			$query = "SELECT * FROM userinformation WHERE CustomerID=?";

			try{
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param("i", $userID);

				if ($stmt->execute()){
					$res = $stmt->get_result();
					$result = $res->fetch_all(MYSQLI_ASSOC);
					$userData = $result[0]; // get only the first row of records
				}
				
				if (!empty($userData)){
					$this->c_id = $userData['CustomerID'];
					$this->f_name = $userData['CustomerFName'];
					$this->l_name = $userData['CustomerLName'];
					$this->c_email = $userData['Email'];
					$this->c_password = $userData['Password'];
					$this->c_pnumber = $userData['PhoneNo'];
					$this->s_question = $userData['SecQuestion'];
					$this->s_answer = $userData['SecAnswer'];
					$this->user_role = $userData['RolesID'];
				}
				$res->free_result();
				
			} catch (Exception $e){
				echo "Error: ".$e.getMessage();
			}
		}

		// update an existing user
		public function updateUser(){
			$query = "UPDATE
						".$this->tableName."
					SET
						CustomerFName=?,
						CustomerLName=?,
						Email=?,
						Password=?,
						PhoneNo=?
					WHERE
						CustomerID=?";
						
			try{
				$stmt = $this->conn->prepare($query);

				$stmt->bind_param('sssssi', $this->f_name,$this->l_name,$this->c_email,$this->c_password,$this->c_pnumber,$this->c_id);

				if ($stmt->execute()){
					return "Succesfully update information";
				}
				return "Failed to update information. Please contact web developer if this happens again.";
				
			} catch (Exception $e){
				return "Error: ".$e.getMessage();
			}
		}
		
		public function createOrder(){
			$f_name = $this->f_name;
			$l_name = $this->l_name;
			$c_email = $this->c_email;
			$c_password = $this->c_password;
			$c_pnumber = $this->c_pnumber;
			$s_question = $this->s_question;
			$s_answer = $this->s_answer;
			// set customer's role by default
			$this->user_role = 1;
			$user_role = $this->user_role;

			$query = "
					INSERT INTO ".$this->tableName."(RolesID,CustomerFName, CustomerLName, Email, Password, PhoneNo, SecQuestion, SecAnswer) 
					VALUES ('$user_role','$f_name', '$l_name', '$c_email', '$c_password', '$c_pnumber', '$s_question', '$s_answer')";
			
			if (!mysqli_query($this->conn, $query)) {
			
			  echo "Error: " . $query. "<br>" . mysqli_error($this->conn);
			}
		}
		
		public function ifExist($userEmail,$userPassword){
			
			
			$result = mysqli_query($this->conn, "SELECT * FROM userinformation WHERE Email LIKE '$userEmail'AND Password LIKE '$userPassword'");
			
			
			$row = mysqli_fetch_assoc($result);

			if($row == null)
			{
				echo "<p align=center>User account does not exist.</p>";
				return false;
			}else{
				$this->f_name = $row['CustomerFName'];
				$this->l_name = $row['CustomerLName'];
				$this->c_id = $row['CustomerID'];
				$this->user_role = $row['RolesID'];
				return true;
			}
		}
		
		
		public function ifEmailExist($userEmail){
			
			$result = mysqli_query($this->conn, "SELECT * FROM userinformation WHERE Email LIKE '$userEmail'");
			
			
			$row = mysqli_fetch_assoc($result);

			if($row == null)
			{
				echo "<p align=center>User account does not exist.</p>";
				return false;
			}else{
				return true;
			}
		}
		
		public function retrieveSecQues($userEmail){
			$result = mysqli_query($this->conn, "SELECT * FROM userinformation WHERE Email LIKE '$userEmail'");
			
			
			$row = mysqli_fetch_assoc($result);

			if($row == null)
			{
				echo '<p align=center>Security Question does not exist.</p>';
				
			}else{
				echo '<p id="showSecQues"><p>Security Question: '.$row['SecQuestion'].'</p>';
				
			}
			
		}
		
		public function matchSecAns($userEmail,$userAns){
			$result = mysqli_query($this->conn, "SELECT SecAnswer FROM userinformation WHERE Email = '$userEmail'");
			
			
			$row = mysqli_fetch_assoc($result);
			
			if($row['SecAnswer']== $userAns)
			{
				return true;
				
			}
			return false;
			
		}
		
		public function changePassword($pass, $userEmail){
			$query= "UPDATE userinformation SET Password='$pass' WHERE Email LIKE '$userEmail'";
			
			if (!mysqli_query($this->conn, $query)) {
			
			  echo "Error: " . $query. "<br>" . mysqli_error($this->conn);
			}
			else{
				echo '<h1 class="changePassword">Password Changed Successfully</h1>';
				echo '<p class="changePassword">Please login with your new password.</p>';
			}
		}

		public function checkAuthority($authorised_roles){
			$result = false;
			foreach ($authorised_roles as $role){
				if ($this->user_role==$role){
					$result = true;
				}
			}

			if (!$result){
				header('Location: cust_login.php');
			}
		}
	}
	

?>
