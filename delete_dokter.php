<?php
include 'koneksi.php'; // Sisipkan file koneksi.php di sini

if (isset($_GET['idDokter'])) {
    $idDokter = $_GET['idDokter'];
    
    $hapus = $koneksi->query("DELETE FROM dokter WHERE idDokter = '$idDokter'");
    
    if ($hapus) {
        // Jika penghapusan berhasil, redirect ke halaman dokter.php
        header("location: dokter.php");
        exit(); // Pastikan script berhenti setelah redirect
    } else {
        // Jika terjadi kesalahan dalam penghapusan
        echo "Error: " . $koneksi->error;
    }
} else {
    // Jika tidak ada idDokter yang diberikan, mungkin ada kesalahan
    echo "ID Dokter tidak ditemukan.";
}
?>
