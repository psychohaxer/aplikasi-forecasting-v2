<?php
    include_once 'operation/connect.php';
    include_once 'operation/forecast.php';

    $forecast = new Forecast();
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
                    $result=$forecast->lihatData();
                    $x=0;
                    while ($row=$result->fetch_assoc()){
                ?>
                <tr id="ramalan">
                    <td id="ramalan"><aaa><?php echo "Minggu ke-" , $row['minggu'] , " Bulan " , $row['bulan'] , " Tahun " , $row['tahun'];?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $row['jumlah'];?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $x;?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $row['jumlah'];?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $x*$x;?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $row['jumlah']*$x; $x++?></aaa></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>

        <br>
        <?php include 'footer.php' ?>
    </body>
</html>