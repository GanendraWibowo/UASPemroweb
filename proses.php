<?php
include 'koneksi.php';

if (isset($_POST['aksi'])) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $id = isset($_POST['id_siswa']) ? $_POST['id_siswa'] : null;

    // Handle file upload
    $foto_siswa = '';
    if (isset($_FILES['foto_siswa']) && $_FILES['foto_siswa']['error'] == UPLOAD_ERR_OK) {
        $foto_siswa = '../img/' . basename($_FILES['foto_siswa']['name']);
        move_uploaded_file($_FILES['foto_siswa']['tmp_name'], $foto_siswa);
    }

    if ($_POST['aksi'] == "add") {
        // Using prepared statement to avoid SQL injection
        $stmt = $conn->prepare("INSERT INTO tb_siswa (nisn, nama_siswa, jenis_kelamin, foto_siswa, alamat) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nisn, $nama, $kelamin, $foto_siswa, $alamat);
        $stmt->execute();
        $stmt->close();

        echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>";
    } else if ($_POST['aksi'] == "edit") {
        // Using prepared statement to avoid SQL injection
        if (!empty($foto_siswa)) {
            $stmt = $conn->prepare("UPDATE tb_siswa SET nisn = ?, nama_siswa = ?, jenis_kelamin = ?, foto_siswa = ?, alamat = ? WHERE id_siswa = ?");
            $stmt->bind_param("sssssi", $nisn, $nama, $kelamin, $foto_siswa, $alamat, $id);
        } else {
            $stmt = $conn->prepare("UPDATE tb_siswa SET nisn = ?, nama_siswa = ?, jenis_kelamin = ?, alamat = ? WHERE id_siswa = ?");
            $stmt->bind_param("ssssi", $nisn, $nama, $kelamin, $alamat, $id);
        }
        $stmt->execute();
        $stmt->close();

        echo "<script>
            alert('Data berhasil diedit');
            document.location.href = 'index.php';
        </script>";
    }
}

if (isset($_GET['hapus'])) {
    $hapus = $_GET['hapus'];

    // Using prepared statement to avoid SQL injection
    $stmt = $conn->prepare("DELETE FROM tb_siswa WHERE id_siswa = ?");
    $stmt->bind_param("i", $hapus);
    $stmt->execute();
    $stmt->close();

    echo "<script>
        alert('Data berhasil dihapus');
        document.location.href = 'index.php';
    </script>";
}
