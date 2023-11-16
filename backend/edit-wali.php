<?php
include 'koneksi.php';

$id_wali = $_POST['id_wali'];
$nama = htmlspecialchars($_POST['nama_wali'], ENT_QUOTES, 'UTF-8');
$jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin'], ENT_QUOTES, 'UTF-8');
$alamat= htmlspecialchars($_POST['alamat_wali'], ENT_QUOTES, 'UTF-8');

$stmt = $koneksi->prepare("UPDATE wali_mahasiswa SET nama_wali = ?, jenis_kelamin = ?, alamat_wali = ? WHERE id_wali = ?");
$stmt->bind_param("sssi", $nama, $jenis_kelamin, $alamat, $id_wali);
$stmt->execute();

header("location: ../index-admin.php");
?>