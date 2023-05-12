        <?php include 'header.php' ?>

        <div id="datacontainer">
        <table id="data" class="table">
            <thead>
                <tr>
                    <th scope="col">Time Series</th>
                    <th scope="col">Penjualan</th>
                    <th scope="col">X</th>
                    <th scope="col">Y</th>
                    <th scope="col">X<sup>2</sup></th>
                    <th scope="col">XY</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $arrayData = Penjualan::readAllData();
                foreach ($arrayData as $data) {
                    ?>
                    <tr>
                        <td><?php echo "Minggu ke-" , $data->minggu , " Bulan " , $data->bulan , "<br>Tahun " , $data->tahun; ?></td>
                        <td><?php echo $data->jumlah; ?></td>
                        <td><?php echo $x; ?></td>
                        <td><?php echo $data->jumlah; ?></td>
                        <td><?php echo $x * $x; ?></td>
                        <td>
                            <?php
                            echo $data->jumlah * $x;
                            $sx += $x;
                            $sy += $data->jumlah;
                            $sxx += ($x * $x);
                            $sxy += ($data->jumlah * $x);
                            $x++;
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <th id="judul" colspan="2">Jumlah</th>
                    <td id="judul"><?php echo $sx ?></td>
                    <td id="judul"><?php echo $sy ?></td>
                    <td id="judul"><?php echo $sxx ?></td>
                    <td id="judul"><?php echo $sxy ?></td>
                </tr>
                <tr>
                    <th id="judul" colspan="2">Rata-rata</th>
                    <td id="judul"><?php echo ($sx/$x) ?></td>
                    <td id="judul"><?php echo ($sy/$x) ?></td>
                    <td id="judul">-</td>
                    <td id="judul">-</td>
                </tr>
                <?php
                $no = $x;
                $b1 = ($sxy - (($sx * $sy)/$no))/($sxx-(($sx*$sx)/$no));
                $b0 = ($sy/$no) - ($b1*($sx/$no));
                ?>
                <tr>
                    <th id="judul" colspan="2">Rumus Regresi Linear:</th>
                    <th id="judul" colspan="4"><?php echo "$b0 + $b1 x"; ?></th>
                </tr>
            </tbody>
        </table>

        </div>

        <?php
            if(isset($_GET['estimasi'])){
                $now = $_GET['estimasi'];
                $estimasi[$now] = 'selected';
                $prediksi = $b0 + $b1 * $now;
            }
        ?>

        <div id="predicont">
            <table id="prediksidata" class="table">
                <th id="judul" colspan="4">Form Prediksi Penjualan</th>
                <tr>
                    <td width="fit-content">Penjualan untuk&nbsp;</td>
                    <td width="fit-content">
                        <select id="dropdown" name="minggu" form="prediksi" method="POST" onchange="hitung(this.value)">
                            <option value="1" <?php echo $estimasi['1'] ?>>1</option>
                            <option value="2" <?php echo $estimasi['2'] ?>>2</option>
                            <option value="3" <?php echo $estimasi['3'] ?>>3</option>
                            <option value="4" <?php echo $estimasi['4'] ?>>4</option>
                            <option value="5" <?php echo $estimasi['5'] ?>>5</option>
                            <option value="6" <?php echo $estimasi['6'] ?>>6</option>
                            <option value="7" <?php echo $estimasi['7'] ?>>7</option>
                            <option value="8" <?php echo $estimasi['8'] ?>>8</option>
                            <option value="9" <?php echo $estimasi['9'] ?>>9</option>
                            <option value="10" <?php echo $estimasi['10'] ?>>10</option>
                        </select>
                    </td>
                    <td width="fit-content">&nbsp;minggu berikutnya:&nbsp;</td>
                    <td width="fit-content"><?php echo $prediksi; ?></td>
                </tr>
            </table>
        </div>


        <br>

        <?php include 'footer.php' ?>
    </body>
</html>