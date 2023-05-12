<?php
    include_once 'operation/penjualan.php';
    include_once 'operation/backend_lihat.php';
    include_once 'operation/backend_perkiraan.php'
?>

<html>
    <head>
        <!-- Judul halaman -->
        <title>Aplikasi Forecasting v.2.0</title>
        
        <!-- Mengatur pengkodean karakter dan viewport untuk responsivitas -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Memasukkan file CSS Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/custom.css">

        <!-- Mengatur favicon untuk situs web -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

        <script>
            function hitung(value){
                window.location.href="perkiraan.php?estimasi=" + value;
            }
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- Merek navbar -->
                <a class="navbar-brand" href="#">Aplikasi Forecasting v.2.0</a>
                <a class="navbar-brand" href="#">|</a>
                <!-- Tombol toggle untuk tampilan responsif pada perangkat mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Daftar menu navbar -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="lihat.php">✍ CRUD Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perkiraan.php">✨ Prediksi Data</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
