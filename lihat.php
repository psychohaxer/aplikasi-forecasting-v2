<?php
    include_once 'operation/penjualan.php';
    include_once 'operation/backend_lihat.php'
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

        <div id="inputcont">
            <table id="inputdata">
                <th id="judul" colspan="2"> Form Input/Edit Data </th>
                <tr width="100%">
                    <td align="left"> Minggu </td>
                    <td> <select id="dropdown" name="minggu" form="input" method="POST">
                        <option value="1" <?php echo $minggu['1'] ?> > 1 </option>
                        <option value="2" <?php echo $minggu['2'] ?> > 2 </option>
                        <option value="3" <?php echo $minggu['3'] ?> > 3 </option>
                        <option value="4" <?php echo $minggu['4'] ?> > 4 </option>
                    </select> </td>
                </tr>
                <tr width="100%">
                    <td align="left"> Bulan </td>
                    <td> <select id="dropdown" name="bulan" form="input" method="POST">
                        <option value="1" <?php echo $bulan['1'] ?>> Januari </option>
                        <option value="2" <?php echo $bulan['2'] ?>> Februari </option>
                        <option value="3" <?php echo $bulan['3'] ?>> Maret </option>
                        <option value="4" <?php echo $bulan['4'] ?>> April </option>
                        <option value="5" <?php echo $bulan['5'] ?>> Mei </option>
                        <option value="6" <?php echo $bulan['6'] ?>> Juni </option>
                        <option value="7" <?php echo $bulan['7'] ?>> Juli </option>
                        <option value="8" <?php echo $bulan['8'] ?>> Agustus </option>
                        <option value="9" <?php echo $bulan['9'] ?>> September </option>
                        <option value="10" <?php echo $bulan['10'] ?>> Oktober </option>
                        <option value="11" <?php echo $bulan['11'] ?>> November </option>
                        <option value="12" <?php echo $bulan['12'] ?>> Desember </option>
                    </select> </td>
                </tr width="100%">
                <tr>
                    <form action="" method="POST" enctype="multipart/form-data" id="input">
                    <td align="left"> Tahun </td> <td> <input type="year" name="tahun" width="80%" value="<?php echo $penjualan->tahun ?>"/> </td>
                    </form>
                </tr>
                <tr width="100%">
                    <form action="" method="POST" enctype="multipart/form-data" id="input">
                    <td align="left"> Jumlah </td> <td> <input type="text" name="jumlah" width="80%" value="<?php echo $penjualan->jumlah ?>" form="input"/> </td>
                    </form>
                </tr>
                <tr width="100%">
                    <form action="" method="POST" enctype="multipart/form-data" id="input">
                    <input type="hidden" name="state" value="<?php echo isset($_GET['state']) ? $_GET['state'] : 'create' ?>" id="input" form="input">
                    <td colspan="2" width="100%"> <button type="submit" name="submit" id="submit" form="input"> Simpan </button> </td>
                    </form>
                </tr>
            </table>
        </div>

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
                    $arrayData = Penjualan::readAllData();
                    foreach ($arrayData as $data){
                ?>
                <tr id="center">
                    <td id="center"><aaa><?php echo $data->id_jual;?></aaa></td>
                    <td id="center"><aaa><?php echo $data->minggu;?></aaa></td>
                    <td id="center"><aaa><?php echo $data->bulan;?></aaa></td>
                    <td id="center"><aaa><?php echo $data->tahun;?></aaa></td>
                    <td id="center"><aaa><?php echo $data->jumlah;?></aaa></td>
                    <td id="center">
                        <a href="lihat.php?id_jual=<?php echo $data->id_jual; ?>&state=edit" id="actK">Edit</a>
                    </td>
                    <td id="center">
                        <a href="lihat.php?id_jual=<?php echo $data->id_jual; ?>&state=delete" id="actK">Delete</a>
                    </td>
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