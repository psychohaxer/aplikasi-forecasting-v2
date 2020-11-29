<?php
    include_once 'mirror.php';
    
    class Forecast{
        private $conn;
        private $host="localhost";
		private $user="root";
		private $pass="";
		private $db="forecasting";

        function __construct(){
            $database = new Mirror();
            $db = $database->Connect();
            $this->conn= $db;
        }
		
		public function Connect(){
			$this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
			if(!$this->conn){
				echo "<p>Gagal terhubung ke database!</p>";
			}
			return $this->conn;
		}

        public function inputData(){
            $query="INSERT INTO penjualan (minggu,bulan,tahun,jumlah) VALUES (
                '".$minggu."',
                '".$bulan."',
                '".$tahun."',
                '".$jumlah."',
                '')";

            $result = $this->conn->query($query) or die($this->conn->error);
        }

        public function takeForecast(){  
            $query="SELECT * FROM penjualan ORDER BY id_jual ASC";
            $result = $this->conn->query($query) or die($this->conn->error);
            return $result;
        }

        public function editData($id_jual,$minggu,$bulan,$tahun,$jumlah){
            $query="UPDATE penjualan SET 
            id_jual='".$id_jual."',
            minggu='".$minggu."',
            bulan='".$bulan."',
            tahun='".$tahun."',
            jumlah='".$jumlah."'            
            WHERE id_jual='".$id_jual."'";

            $result = $this->conn->query($query) or die($this->conn->error);
        }

        public function hapusData($uniqueColumn,$uniqueValue){            
            $query="DELETE FROM penjualan WHERE $uniqueColumn=$uniqueValue";
            $result = $this->conn->query($query) or die($this->conn->error);
        }

    }
?>
