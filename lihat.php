        <?php include 'header.php'; ?>

        <div class="kontainer">
            <table>
                <thead>
                    <th colspan="2"> Form Input/Edit Data </th>
                    <tr>
                        <td align="left"> Minggu </td>
                        <td> 
                            <select id="dropdown" name="minggu" form="input" method="POST" class="form-select">
                                <option value="1" <?php echo $minggu['1'] ?>> 1 </option>
                                <option value="2" <?php echo $minggu['2'] ?>> 2 </option>
                                <option value="3" <?php echo $minggu['3'] ?>> 3 </option>
                                <option value="4" <?php echo $minggu['4'] ?>> 4 </option>
                            </select> 
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="left"> Bulan </td>
                        <td> 
                            <select id="dropdown" name="bulan" form="input" method="POST" class="form-select">
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
                            </select> 
                        </td>
                    </tr>

                    <tr>
                        <form action="" method="POST" enctype="multipart/form-data" id="input">
                            <td align="left"> Tahun </td> 
                            <td> 
                                <input type="year" name="tahun" class="form-control" value="<?php echo $penjualan->tahun ?>"/>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <form action="" method="POST" enctype="multipart/form-data" id="input">
                            <td align="left"> Jumlah </td> 
                            <td> 
                                <input type="text" name="jumlah" class="form-control" value="<?php echo $penjualan->jumlah ?>" form="input"/>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <form action="" method="POST" enctype="multipart/form-data" id="input">
                            <input type="hidden" name="state" value="<?php echo isset($_GET['state']) ? $_GET['state'] : 'create' ?>" form="input">
                            <td colspan="2"> 
                                <button type="submit" name="submit" class="btn btn-primary" form="input" style='margin-top: 10px;'> Simpan </button> 
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="kontainer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Jual</th>
                        <th scope="col">Minggu</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $arrayData = Penjualan::readAllData();
                        foreach ($arrayData as $data) {
                    ?>
                    <tr>
                        <td><?php echo $data->id_jual; ?></td>
                        <td><?php echo $data->minggu; ?></td>
                        <td><?php echo $data->bulan; ?></td>
                        <td><?php echo $data->tahun; ?></td>
                        <td><?php echo $data->jumlah; ?></td>
                        <td>
                            <a href="lihat.php?id_jual=<?php echo $data->id_jual; ?>&state=edit" class="btn btn-primary">Edit</a>
                            <a href="lihat.php?id_jual=<?php echo $data->id_jual; ?>&state=delete" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <br>
        <?php include 'footer.php' ?>