<?php
include 'koneksi.php';
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$nama_wali = strtolower($_POST['nama_wali']);

$stmt = $koneksi->prepare("SELECT * FROM wali_mahasiswa WHERE LOWER(nama_wali) = ?");
$stmt->bind_param('s', $nama_wali);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
$id_wali = $row['id_wali'];

$stmt = $koneksi->prepare("INSERT INTO mahasiswa (nim, nama, jurusan, jenis_kelamin, alamat, id_wali) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $nim, $nama, $jurusan, $jenis_kelamin, $alamat, $id_wali);
$stmt->execute();

header("location: ../index-admin.php");
?>