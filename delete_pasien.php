<?php
include 'koneksi.php'; // Sisipkan file koneksi.php di sini

if (isset($_GET['idPasien'])) {
    $idPasien = $_GET['idPasien'];
    
    // Lakukan query untuk menghapus data dari tabel pasien berdasarkan idPasien
    $hapus = $koneksi->query("DELETE FROM pasien WHERE idPasien = '$idPasien'");
    
    if ($hapus) {
        // Jika penghapusan berhasil, redirect ke halaman pasien.php
        header("location: pasien.php");
    } else {
        // Jika terjadi kesalahan dalam penghapusan
        echo "Error: " . $koneksi->error;
    }
} else {
    // Jika tidak ada idPasien yang diberikan, mungkin ada kesalahan
    echo "ID Pasien tidak ditemukan.";
}
?>
