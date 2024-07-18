<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
                <h3>Edit Data Pasien</h3>
                <?php
                include 'koneksi.php';
                if (isset($_GET['edit'])) {
                    $idPasien = $_GET['edit'];
                    echo "<p>Debug: idPasien = $idPasien</p>"; // Debugging
                    $panggil = $koneksi->query("SELECT * FROM pasien WHERE idPasien='$idPasien'");

                    if ($panggil->num_rows > 0) {
                        $row = $panggil->fetch_assoc();
                ?>
                <form action="koneksi.php" method="POST">
                    <div class="form-group">
                        <label for="idPasien">ID Pasien</label>
                        <input type="text" class="form-control" name="idPasien" value="<?= $row['idPasien'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nmPasien">Nama Pasien</label>
                        <input type="text" class="form-control" name="nmPasien" value="<?= $row['nmPasien'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jk" value="Perempuan" <?php if ($row['jk'] === "Perempuan") { echo "checked"; } ?>>
                            <label class="form-check-label">Perempuan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jk" value="Laki-Laki" <?php if ($row['jk'] === "Laki-Laki") { echo "checked"; } ?>>
                            <label class="form-check-label">Laki-Laki</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $row['alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
                <?php 
                    } else { 
                        echo "<p>Debug: Tidak ada data ditemukan untuk idPasien = $idPasien</p>"; // Debugging
                ?>
                    <div class="alert alert-danger" role="alert">
                        Data pasien tidak ditemukan.
                    </div>
                <?php 
                    }
                } else { 
                    echo "<p>Debug: Parameter edit tidak ditemukan di URL</p>"; // Debugging
                ?>
                    <div class="alert alert-danger" role="alert">
                        Parameter edit tidak ditemukan di URL.
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
