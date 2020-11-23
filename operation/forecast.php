<?php
    include_once 'mirror.php';
    
    class Forecast{
        private $conn;

        function __construct(){
            $database = new Mirror();
            $db = $database->Connect();
            $this->conn= $db;
        }

        public function inputData($id_jual,$minggu,$bulan,$tahun,$jumlah){
            $query="INSERT INTO penjualan VALUES (
                '".$id_jual."',
                '".$minggu."',
                '".$bulan."',
                '".$tahun."',
                '".$jumlah."',
                '')";

            $result = $this->conn->query($query) or die($this->conn->error);
        }

        public function lihatData(){  
            $query="SELECT * FROM penjualan";
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
