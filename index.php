<?php
include 'koneksi.php';



$query = "SELECT * FROM tb_siswa;";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!--Font Awesomw-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

    <!--custom css-->
    <link rel="stylesheet" href="style.css">

    <title>Hrya International School</title>
</head>

<body style="background-color: #00ffff ;">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <p style="color: black;">Project Akhir PemroWEB</p>
            </a>
        </div>
    </nav>

    <!--Judul-->
    <div class="container">
        <p style="color:blue"><center><h1 class="mt-4">Hrya International School</h1></center></p>
        <figure>
            <blockquote class="blockquote">
                <p>Data Siswa HIS</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <p style="color: blue;"><cite title="Source Title">Metode Create Read Update Delete</cite></p> 
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-info mb-3">
            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
            Add Data
        </a>
        <a href="login.php" class="btn btn-info mb-3" onclick="return confirm('Apakah anda yakin untuk keluar?')"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a>
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            <center>NO.</center>
                        </th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto Siswa</th>
                        <th>Alamat&Kesan Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td>
                                <center>
                                    <?php echo ++$no; ?>.
                                </center>
                            </td>
                            <td>
                                <?php echo $result['nisn']; ?>
                            </td>
                            <td>
                                <?php echo $result['nama_siswa']; ?>
                            </td>
                            <td>
                                <?php echo $result['jenis_kelamin']; ?>
                            </td>
                            <td>
                                <img src="img/<?php echo $result['foto_siswa']; ?>" style="width:100px;">
                            </td>
                            <td>
                                <?php echo $result['alamat']; ?>
                            </td>
                            <td>
                                <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-primary btn-sm" onclick="return confirm('apakah anda yakin ingin menghapus data dengan nisn <?= $result['nisn']; ?>');">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    Delete
                                </a>
                                <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-info btn-sm">
                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                    Update
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>