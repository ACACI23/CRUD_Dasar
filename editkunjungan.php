<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Kunjungan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
    <h3>Edit Kunjungan</h3>
    <?php
    include 'koneksi.php';
    $idKunjungan = $_GET['edit'];
    $hasil = $koneksi->query("SELECT * FROM kunjungan WHERE idKunjungan=$idKunjungan");
    $row = $hasil->fetch_assoc();
    ?>
    <form action="koneksi.php" method="POST">
      <input type="hidden" name="idKunjungan" value="<?= $row['idKunjungan']; ?>">
      <div class="mb-3">
        <label for="idDokter" class="form-label">ID Dokter</label>
        <input type="text" class="form-control" id="idDokter" name="idDokter" value="<?= $row['idDokter']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="idPasien" class="form-label">ID Pasien</label>
        <input type="text" class="form-control" id="idPasien" name="idPasien" value="<?= $row['idPasien']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $row['tanggal']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="keluhan" class="form-label">Keluhan</label>
        <textarea class="form-control" id="keluhan" name="keluhan" rows="3" required><?= $row['keluhan']; ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="edit_kunjungan">Simpan</button>
    </form>
  </div>
</body>
</html>
