<?php
	class Database{
		private $host="localhost";
		private $user="root";
		private $pass="";
		private $db="forecasting";
		public $conn;
		
		public function Connect(){
			$this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
			if(!$this->conn){
				echo "<p>Gagal terhubung ke database!</p>";
			}
			return $this->conn;
		}
	}
	$connect= mysqli_connect("localhost","root","","forecasting");
?>