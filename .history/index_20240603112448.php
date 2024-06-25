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
    <link rel="stylesheet" href="styles.css">
    <title>Hrya High School</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                CRUD - BS5
            </a>
        </div>
    </nav>

    <!--Judul-->
    <div class="container">
        <h1 class="mt-4">Data Siswa Hrya High School</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Data yang tersimpan dalam database</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Creat Read Update Delete</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-danger mb-3">
            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
            Add Data
        </a>
        <div class="table-responsive">  
            <table class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th><center>NO.</center></th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto Siswa</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($result = mysqli_fetch_assoc($sql)){
                ?>
                    <tr>
                        <td><center>
                            <?php echo ++$no; ?>.
                        </center></td>
                        <td>
                            <?php echo $result['nisn'];?>
                        </td>
                        <td>
                            <?php echo $result['nama_siswa'];?>
                        </td>
                        <td>
                            <?php echo $result['jenis_kelamin'];?>
                        </td>
                        <td>
                            <img src="img/<?php echo $result['foto_siswa']; ?>" style="width:100px;">
                        </td>
                        <td>
                            <?php echo $result['alamat']; ?>
                        </td>
                        <td>
                            <a href="proses.php?hapus=<?php echo $result['id_siswa'];?>" type="button" class="btn btn-secondary btn-sm" onclick="return confirm('apakah anda yakin ingin menghapus data dengan nisn <?= $result['nisn'];?>');">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                Delete
                            </a>
                            <a href="kelola.php?ubah=<?php echo $result['id_siswa'];?>" type="button" class="btn btn-dark btn-sm">
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