<?php
include 'koneksi.php';

$id_mhs = $_POST['id_mhs'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat= $_POST['alamat'];

$stmt = $koneksi->prepare("UPDATE mahasiswa SET nim = ?, nama = ?, jurusan = ?, jenis_kelamin = ?, alamat = ? WHERE id_mhs = ?");
$stmt->bind_param("sssssi", $nim, $nama, $jurusan, $jenis_kelamin, $alamat, $id_mhs);
$stmt->execute();

header("location: ../index-admin.php");
?>