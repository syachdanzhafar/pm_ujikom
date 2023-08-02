<?php
include "connection.php";
$no_transaksi   = $_POST["no_transaksi"];
$nama_peserta   = $_POST["nama_peserta"];
$tg             = $_POST["tgl_berobat"];
$bl             = $_POST["bln"];
$th             = $_POST["thn"];
$tgl            = $th . '-' . $bl . '-' . $tg;
$nama_bidan     = $_POST["nama_bidan"];
$keluhan        = $_POST["keluhan"];
$biaya_admin    = $_POST["biaya_admin"];
$query          = "INSERT INTO trekammedis
    VALUES('$no_transaksi','$nama_peserta','$tgl','$nama_bidan','$keluhan','$biaya_admin')";
$conn->query($query);
header("location:data_rekam_medis.php");
