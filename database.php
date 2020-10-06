<?php
class Database{
	// database credentials
	private $host = "localhost";
	private $db_name = "foodedge";
	private $username = "root";
	private $password = "";
	public $conn;
	
	// get database connections
	public function getConnection(){
		$this->conn = null;
		$this->conn = new mysqli($this->host,$this->username,$this->password,$this->db_name) or die ("Connection failed: ". mysqli_connect_error());
		return $this->conn;
	}
	
	public function closeConnection(){
		$this->conn->close();
	}
}
?>