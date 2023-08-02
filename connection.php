<?php
$srvr   = "localhost";
$un     = "root";
$pw     = "";
$db     = "db_apotik";

$conn  = new mysqli($srvr, $un, $pw, $db);

if ($conn->connect_error) {
    die("Gagal Koneksi" . $conn->connect_error);
}
