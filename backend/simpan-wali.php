<?php 
session_start();

include 'koneksi.php';
$nama = htmlspecialchars($_POST['nama_wali'], ENT_QUOTES, 'UTF-8');
$jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin'], ENT_QUOTES, 'UTF-8');
$alamat = htmlspecialchars($_POST['alamat_wali'], ENT_QUOTES, 'UTF-8');

$stmt = $koneksi->prepare('INSERT INTO wali_mahasiswa (nama_wali, jenis_kelamin, alamat_wali) VALUES (?, ?, ?)');
$stmt->bind_param('sss', $nama, $jenis_kelamin, $alamat);

$stmt->execute();

$id_wali = $stmt->insert_id;
$_SESSION['id_wali'] = $id_wali;

header("location: ../form-edit/form-mhs.php");

?>