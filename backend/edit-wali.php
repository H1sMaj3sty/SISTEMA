<?php
include 'koneksi.php';

$id_wali = $_POST['id_wali'];
$nama = $_POST['nama_wali'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat= $_POST['alamat_wali'];

$stmt = $koneksi->prepare("UPDATE wali_mahasiswa SET nama_wali = ?, jenis_kelamin = ?, alamat_wali = ? WHERE id_wali = ?");
$stmt->bind_param("sssi", $nama, $jenis_kelamin, $alamat, $id_wali);
$stmt->execute();

header("location: ../index-admin.php");
?>