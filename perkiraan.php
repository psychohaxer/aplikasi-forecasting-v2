<?php
    include_once 'operation/forecast.php';

    $forecast = new Forecast();
    $koneksi = 
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
                    $x = $sx = $sy = $sxx = $sxy=0;
                    while ($row=$result->fetch_assoc()){
                ?>
                <tr id="ramalan">
                    <td id="ramalan"><aaa><?php echo "Minggu ke-" , $row['minggu'] , " Bulan " , $row['bulan'] , "<br>Tahun " , $row['tahun'];?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $row['jumlah'];?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $x;?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $row['jumlah'];?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $x*$x;?></aaa></td>
                    <td id="ramalan"><aaa><?php echo $row['jumlah']
                    *$x;
                    $sx+=$x;
                    $sy+=$row['jumlah'];
                    $sxx+=($x*$x);
                    $sxy+=($row['jumlah']*$x);
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

        <br>
        <?php include 'footer.php' ?>
    </body>
</html>