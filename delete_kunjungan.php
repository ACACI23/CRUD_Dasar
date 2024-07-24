<?php
include 'koneksi.php';

$idKunjungan = $_GET['idKunjungan'];
$koneksi->query("DELETE FROM kunjungan WHERE idKunjungan=$idKunjungan");

header('location:kunjungan.php');
?>
