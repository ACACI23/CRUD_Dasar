<?php
$koneksi = new mysqli('localhost', 'root', '', 'aurel_xipplg1') or die(mysqli_error($koneksi));

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
?>
