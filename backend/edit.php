<?php
include 'koneksi.php';

$id_mhs = $_POST['id_mhs'];
$nim =  htmlspecialchars($_POST['nim'], ENT_QUOTES, 'UTF-8');
$nama =  htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8');
$jurusan = htmlspecialchars($_POST['jurusan'], ENT_QUOTES, 'UTF-8');
$jenis_kelamin =  htmlspecialchars($_POST['jenis_kelamin'], ENT_QUOTES, 'UTF-8');
$alamat= htmlspecialchars($_POST['alamat'], ENT_QUOTES, 'UTF-8');

$stmt = $koneksi->prepare("UPDATE mahasiswa SET nim = ?, nama = ?, jurusan = ?, jenis_kelamin = ?, alamat = ? WHERE id_mhs = ?");
$stmt->bind_param("sssssi", $nim, $nama, $jurusan, $jenis_kelamin, $alamat, $id_mhs);
$stmt->execute();

header("location: ../index-admin.php");
?>