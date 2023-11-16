<?php
include 'koneksi.php';
$nim = htmlspecialchars($_POST['nim'], ENT_QUOTES, 'UTF-8');
$nama = htmlspecialchars($_POST['nama'], ENT_QUOTES,'UTF-8');
$jurusan = htmlspecialchars($_POST['jurusan'], ENT_QUOTES, 'UTF-8');
$jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin'], ENT_QUOTES, 'UTF-8');
$alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES, 'UTF-8');
$nama_wali = htmlspecialchars(strtolower($_POST['nama_wali']), ENT_QUOTES, 'UTF-8');

$stmt = $koneksi->prepare("SELECT * FROM wali_mahasiswa WHERE LOWER(nama_wali) = ?");
$stmt->bind_param('s', $nama_wali);
$stmt->execute();
$name_result = $stmt->get_result();
if (mysqli_num_rows($name_result) < 1) {
    echo "<script>
    alert('Parent\\'s name does not exist');window.location.href='../cred/walinotexist.php';
    </script>";
    exit();
}

$result = $stmt->get_result();
$row = $result->fetch_assoc();
$id_wali = $row['id_wali'];

$stmt = $koneksi->prepare("INSERT INTO mahasiswa (nim, nama, jurusan, jenis_kelamin, alamat, id_wali) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $nim, $nama, $jurusan, $jenis_kelamin, $alamat, $id_wali);
$stmt->execute();

header("location: ../index-admin.php");
?>
