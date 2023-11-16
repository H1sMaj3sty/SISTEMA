<?php 
session_start();

include 'koneksi.php';
$nama = $_POST['nama_wali'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat_wali'];

$stmt = $koneksi->prepare('INSERT INTO wali_mahasiswa (nama_wali, jenis_kelamin, alamat_wali) VALUES (?, ?, ?)');
$stmt->bind_param('sss', $nama, $jenis_kelamin, $alamat);

$stmt->execute();

$id_wali = $stmt->insert_id;
$_SESSION['id_wali'] = $id_wali;

header("location: ../form-edit/form-mhs.php");

?>