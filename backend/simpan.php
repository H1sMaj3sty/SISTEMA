<?php
include 'koneksi.php';
$nim = htmlspecialchars($_POST['nim'], ENT_QUOTES, 'UTF-8');
$nama = htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8');
$jurusan = htmlspecialchars($_POST['jurusan'], ENT_QUOTES, 'UTF-8');
$jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin'], ENT_QUOTES, 'UTF-8');
$alamat =  htmlspecialchars($_POST['alamat'], ENT_QUOTES, 'UTF-8');
$id_wali = htmlspecialchars($_POST['id_wali'], ENT_QUOTES, 'UTF-8');

$stmt = $koneksi->prepare("INSERT INTO mahasiswa (nim, nama, jurusan, jenis_kelamin, alamat, id_wali) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $nim, $nama, $jurusan, $jenis_kelamin, $alamat, $id_wali);
$stmt->execute();

header("location: ../index-admin.php");
?>