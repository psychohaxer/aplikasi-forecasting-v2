<?php
    include_once 'operation/penjualan.php';
    include_once 'operation/backend_perkiraan.php'
?>

<html>
    <head>
        <title> Aplikasi Forecasting </title>

        <link rel="stylesheet" type="text/css" href="css/screen.css">
        <link rel="stylesheet" type="text/css" href="css/object.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <style ="text/css">
            body {
                background-image:url("img/haihead.jpg");
                background-repeat:no-repeat;
                background-position:center;
                background-attachment:fixed;
            }
        </style>
        
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

        <script>
            function hitung(value){
                window.location.href="perkiraan.php?estimasi=" + value;
            }
        </script>
    </head>
    <body>
        
        <?php include 'header.php' ?>

        <div id="datacontainer">
            <table id="data">
                <tr>
                    <th id="judul"> Time Series </th>
                    <th id="judul"> Penjualan </th>
                    <th id="judul"> X </th>
                    <th id="judul"> Y </th>
                    <th id="judul"> XX </th>
                    <th id="judul"> XY </th>
                </tr>
                <?php
                    $arrayData = Penjualan::readAllData();
                    foreach ($arrayData as $data){
                ?>
                <tr id="ramalan">
                    <td id="ramalan"><aaa><?php echo "Minggu ke-" , $data->minggu , " Bulan " , $data->bulan , "<br>Tahun " , $data->tahun;?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $data->jumlah;?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $x;?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $data->jumlah;?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $x*$x;?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $data->jumlah
                    *$x;
                    $sx+=$x;
                    $sy+=$data->jumlah;
                    $sxx+=($x*$x);
                    $sxy+=($data->jumlah*$x);
                    $x++;?></aaa></td>
                </tr>
                <?php
                    }
                ?>
                
            </table>
            <table id="data">
                <tr>
                    <th id="judul" colspan="2"> Jumlah </th>
                    <th id="judul"> <?php echo $sx ?></th>
                    <th id="judul"> <?php echo $sy ?></th>
                    <th id="judul"> <?php echo $sxx ?></th>
                    <th id="judul"> <?php echo $sxy ?></th>
                </tr>
                <tr>
                    <th id="judul" colspan="2"> Rata-rata </th>
                    <th id="judul"> <?php echo ($sx/$x) ?></th>
                    <th id="judul"> <?php echo ($sy/$x) ?></th>
                    <th id="judul"> - </th>
                    <th id="judul"> - </th>
                </tr>
                <?php
                    $no = $x;
                    $b1 = ($sxy - (($sx * $sy)/$no))/($sxx-(($sx*$sx)/$no));
                    $b0 = ($sy/$no) - ($b1*($sx/$no));
                ?>
                <tr>
                    <th id="judul" colspan="2"> Rumus Regresi Linear: </th>
                    <th id="judul" colspan="4"> <?php echo "$b0 + $b1 x"; ?> </th>
                </tr>
            </table>
        </div>


        <?php
            if(isset($_GET['estimasi'])){
                $now = $_GET['estimasi'];
                $estimasi[$now] = 'selected';
                $prediksi = $b0 + $b1 * $now;
            }
        ?>

        <br>
        <div id="predicont">
            <table id="prediksidata">
                <th id="judul" colspan="4"> Form Prediksi Penjualan </th>
                <tr width="fit-content">
                    <td width="fit-content"> Penjualan untuk &nbsp</td>
                    
                    <td width="fit-content"> <select id="dropdown" name="minggu" form="prediksi" method="POST" onchange="hitung(this.value)">
                        <option value="1" <?php echo $estimasi['1'] ?> > 1 </option>
                        <option value="2" <?php echo $estimasi['2'] ?> > 2 </option>
                        <option value="3" <?php echo $estimasi['3'] ?> > 3 </option>
                        <option value="4" <?php echo $estimasi['4'] ?> > 4 </option>
                        <option value="5" <?php echo $estimasi['5'] ?> > 5 </option>
                        <option value="6" <?php echo $estimasi['6'] ?> > 6 </option>
                        <option value="7" <?php echo $estimasi['7'] ?> > 7 </option>
                        <option value="8" <?php echo $estimasi['8'] ?> > 8 </option>
                        <option value="9" <?php echo $estimasi['9'] ?> > 9 </option>
                        <option value="10" <?php echo $estimasi['10'] ?>> 10 </option>
                    </select> </td>
                    <td width="fit-content">&nbsp minggu berikutnya: &nbsp</td>
                    <td width="fit-content"> <?php echo $prediksi; ?> </td>
                </tr>
            </table>
        </div>

        <br>

        <?php include 'footer.php' ?>
    </body>
</html>