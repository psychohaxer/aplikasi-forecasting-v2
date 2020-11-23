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
        
        <table border="0px" width="100%" id="kop">
            <tr id=kop>
                <td width="10%"><img src="img/Logo1.png" height="120px" width="120px" border="10px" id="kop"> </td>
                <td width="80%" id="judul"> <h1 id="judul"><center> Aplikasi Forecasting </center></h1> </td>
                <td width="10%"><img src="img/Logo2.png" height="120px" width="120px" border="10px" id="kop"> </td>
            </tr>
        </table>
        
        <br>

        <nav id="header">
            <ul id="navbar">
                <a href="#"> <li>✍ Input Data </li> </a>
                <a href="#"> <li>✨ Prediksi Data </li> </a>
            </ul>
        </nav>

        <br>

        <div id="datacontainer">
            <table id="data">
                <tr>
                    <th id="judul"> ID Jual </th>
                    <th id="judul"> Minggu </th>
                    <th id="judul"> Bulan </th>
                    <th id="judul"> Tahun </th>
                    <th id="judul"> Jumlah </th>
                    <th colspan="2" id="judul"> Action </th>
                </tr>
                <?php
                    $result=$forecast->lihatData();
                    while ($row=$result->fetch_assoc()){
                ?>
                <tr id="center">
                    <td id="center"><aaa><?php echo $row['id_jual'];?></aaa></td>
                    <td id="center"><aaa><?php echo $row['minggu'];?></aaa></td>
                    <td id="center"><aaa><?php echo $row['bulan'];?></aaa></td>
                    <td id="center"><aaa><?php echo $row['tahun'];?></aaa></td>
                    <td id="center"><aaa><?php echo $row['jumlah'];?></aaa></td>
                    <td id="center" colspan="2">
                        <a href="edit_siswa.php?nis=<?php echo $row['nis'];?>" id="actK">Edit</a>
                        <a href="hapus_siswa.php?nis=<?php echo $row['nis'];?>" id="actK">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>

        <br>
        <div id="about"><h4> 201951071 | FIRMAN ADI NUR FATIN | <a href="https://github.com/psychohaxer/aplikasi-forecasting">psychohaxer/aplikasi-forecasting</a></h4></div>
    </body>
</html>