<?php
$koneksi = new mysqli('localhost', 'root', '', 'aurel_xipplg1') or die(mysqli_error($koneksi));

// PASIEN

if (isset($_POST['simpan'])) {
    $idPasien = $_POST['idPasien'];
    $nmPasien = $_POST['nmPasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $koneksi->query("INSERT INTO pasien (idPasien, nmPasien, jk, alamat) VALUES ('$idPasien', '$nmPasien', '$jk', '$alamat')");
    header('location:pasien.php');
}

if (isset($_POST['edit'])) {
    $idPasien = $_POST['idPasien'];
    $nmPasien = $_POST['nmPasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $koneksi->query("UPDATE pasien SET nmPasien='$nmPasien', jk='$jk', alamat='$alamat' WHERE idPasien='$idPasien'");
    header("location:pasien.php");
}

if (isset($_GET['idPasien'])) {
    $idPasien = $_GET['idPasien'];
    echo "<script>
            var konfirmasi = confirm('Apakah Anda yakin ingin menghapus data ini?');
            if (konfirmasi) {
                window.location.href = 'delete_pasien.php?idPasien=$idPasien'; // Redirect ke halaman untuk proses delete
            } else {
                window.location.href = 'pasien.php'; // Redirect kembali ke halaman pasien
            }
          </script>";
}

// DOKTER

// Create
if (isset($_POST['simpan_dokter'])) {
    $idDokter = $_POST['idDokter'];
    $nmDokter = $_POST['nmDokter'];
    $spesialisasi = $_POST['spesialisasi'];
    $no_telp = $_POST['noTelp'];
    $koneksi->query("INSERT INTO dokter (idDokter, nmDokter, spesialisasi, noTelp) VALUES ('$idDokter', '$nmDokter', '$spesialisasi', '$no_telp')");
    header('location:dokter.php');
}

// Update
if (isset($_POST['edit_dokter'])) {
    $idDokter = $_POST['idDokter'];
    $nmDokter = $_POST['nmDokter'];
    $spesialisasi = $_POST['spesialisasi'];
    $no_telp = $_POST['noTelp'];
    $koneksi->query("UPDATE dokter SET nmDokter='$nmDokter', spesialisasi='$spesialisasi', noTelp='$no_telp' WHERE idDokter='$idDokter'");
    header('location:dokter.php');
}

// Delete
if (isset($_GET['idDokter'])) {
    $idDokter = $_GET['idDokter'];
    echo "<script>
            var konfirmasi = confirm('Apakah Anda yakin ingin menghapus data ini?');
            if (konfirmasi) {
                window.location.href = 'delete_dokter.php?idDokter=$idDokter';
            } else {
                window.location.href = 'dokter.php';
            }
          </script>";
}

// KUNJUNGAN

// Create
if (isset($_POST['simpan_kunjungan'])) {
    $idDokter = $_POST['idDokter'];
    $idPasien = $_POST['idPasien'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];
    $stmt = $koneksi->prepare("INSERT INTO kunjungan (idDokter, idPasien, tanggal, keluhan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $idDokter, $idPasien, $tanggal, $keluhan);
    $stmt->execute();
    $stmt->close();
    header('location:kunjungan.php');
}

// Update
if (isset($_POST['edit_kunjungan'])) {
    $idKunjungan = $_POST['idKunjungan'];
    $idDokter = $_POST['idDokter'];
    $idPasien = $_POST['idPasien'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];
    $stmt = $koneksi->prepare("UPDATE kunjungan SET idDokter=?, idPasien=?, tanggal=?, keluhan=? WHERE idKunjungan=?");
    $stmt->bind_param("iissi", $idDokter, $idPasien, $tanggal, $keluhan, $idKunjungan);
    $stmt->execute();
    $stmt->close();
    header('location:kunjungan.php');
}

// Delete
if (isset($_GET['idKunjungan'])) {
    $idKunjungan = $_GET['idKunjungan'];
    echo "<script>
            var konfirmasi = confirm('Apakah Anda yakin ingin menghapus data ini?');
            if (konfirmasi) {
                window.location.href = 'delete_kunjungan.php?idKunjungan=$idKunjungan';
            } else {
                window.location.href = 'kunjungan.php';
            }
          </script>";
}
?>
?>
