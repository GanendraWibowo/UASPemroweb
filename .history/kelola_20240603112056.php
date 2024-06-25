<?php
include 'koneksi.php';

$id_siswa = '';
$nisn = '';
$nama_siswa = '';
$jenis_kelamin = '';
$alamat = '';

if (isset($_GET['ubah'])) {
    $id_siswa = $_GET['ubah'];
    $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    if ($result) {
        $nisn = $result['nisn'];
        $nama_siswa = $result['nama_siswa'];
        $jenis_kelamin = $result['jenis_kelamin'];
        $alamat = $result['alamat'];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Hrya High School</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                CRUD - BS5
            </a>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $nisn; ?>" placeholder="ex : 113366">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama_siswa" value="<?php echo $nama_siswa; ?>" placeholder="ex : ashiap santuy">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select id="jkel" name="jenis_kelamin" class="form-select">
                        <option selected><?php echo $jenis_kelamin ? $jenis_kelamin : 'Jenis Kelamin'; ?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">Foto Siswa</label>
                <div class="col-sm-10">
                    <input class="form-control" name="foto_siswa" type="file" id="foto">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" id="alamat" rows="3"><?php echo $alamat; ?></textarea>
                </div>
            </div>

            <?php if (isset($_GET['ubah'])): ?>
                <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>">
            <?php endif; ?>

            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php if (isset($_GET['ubah'])): ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan Perubahan
                        </button>
                    <?php else: ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Tambahkan
                        </button>
                    <?php endif; ?>

                    <a href="index.php" type="button" class="btn btn-info">
                        <i class="fa fa-hand-o-left" aria-hidden="true"></i> Batalkan
                    </a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
