<?php
include 'koneksi.php';
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$id_wali = $_POST['id_wali'];

$stmt = $koneksi->prepare("INSERT INTO mahasiswa (nim, nama, jurusan, jenis_kelamin, alamat, id_wali) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $nim, $nama, $jurusan, $jenis_kelamin, $alamat, $id_wali);
$stmt->execute();

header("location: ../index-admin.php");
?>