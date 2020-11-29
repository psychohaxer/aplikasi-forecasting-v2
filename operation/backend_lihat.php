<?php
    $penjualan = new Penjualan('','','','','');

    $minggu = array();
    $minggu = [
        '1' => '',
        '2' => '',
        '3' => '',
        '4' => '',
    ];

    if(isset($_POST['submit'])){
        var_dump($_POST);
        $penjualan->id_jual = $_GET['id_jual'];
        $penjualan->minggu = $_POST['minggu'];
        $penjualan->bulan = $_POST['bulan'];
        $penjualan->tahun = $_POST['tahun'];
        $penjualan->jumlah = $_POST['jumlah'];
        $state = $_POST['state'];

        if($state == 'edit'){
            $penjualan->editData();
        } elseif($state == 'create'){
            $penjualan->createData();
        }
    }

    if(isset($_GET['id_jual'])){
        $id_jual = $_GET['id_jual'];

        $penjualan->readSpecificData($id_jual);

        $minggu[$penjualan->minggu] = 'selected';
    }

    if (isset($_GET['state'])){
        if($_GET['state'] == 'delete'){
            $penjualan->id_jual = $_GET['id_jual'];
            $penjualan->deleteData();
        }
    }
?>