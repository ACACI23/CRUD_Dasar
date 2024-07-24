<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dokter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
                <h3>Edit Data Dokter</h3>
                <?php
                include 'koneksi.php';
                if (isset($_GET['edit_dokter'])) {
                    $idDokter = $_GET['edit_dokter'];
                    $panggil = $koneksi->query("SELECT * FROM dokter WHERE idDokter='$idDokter'");

                    if ($panggil->num_rows > 0) {
                        $row = $panggil->fetch_assoc();
                ?>
                <form action="koneksi.php" method="POST">
                    <div class="form-group">
                        <label for="idDokter">ID Dokter</label>
                        <input type="text" class="form-control" name="idDokter" value="<?= $row['idDokter'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nmDokter">Nama Dokter</label>
                        <input type="text" class="form-control" name="nmDokter" value="<?= $row['nmDokter'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="spesialisasi">Spesialisasi</label>
                        <textarea class="form-control" name="spesialisasi" id="spesialisasi" rows="3"><?= $row['spesialisasi'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="noTelp">Nomor Telepon</label>
                        <input type="text" class="form-control" name="noTelp" value="<?= $row['noTelp'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="edit_dokter" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
                <?php 
                    } else { 
                ?>
                    <div class="alert alert-danger" role="alert">
                        Data Dokter tidak ditemukan.
                    </div>
                <?php 
                    }
                } else { 
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
