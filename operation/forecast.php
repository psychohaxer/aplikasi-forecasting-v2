<?php
    include_once 'mirror.php';
    
    class Forecast{
        private $conn;

        function __construct(){
            $database = new Mirror();
            $db = $database->Connect();
            $this->conn= $db;
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

        public function lihatData(){  
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

        public function lihatForecast(){
            $sum_x = $sum_y = $sum_xx = $sum_xy = 0;
            $x = -1;
            $query = "SELECT * FROM penjualan ORDER BY id_jual ASC";
            $result = $this->conn->query($query) or die($this->conn->error);

            while($hs = mysql_fetch_array($result)){
                $no++; $x++;
                $minggu = $hs[1];
                $bulan = $hs[2];
                $tahun = $hs[3];
                $jumlah = $hs[4];

                $xx = $x * $x;
                $xy = $x * $jumlah;

                $sum_x = $sum_x + $x;
                $sum_y = $sum_y + $y;
                $sum_xx = $sum_xx + $xx;
                $sum_xy = $sum_xy + $xy;
            }
        }
    }
?>
