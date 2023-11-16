<?php
include 'koneksi.php';

$id_mhs = $_GET['id_mhs'];

if (filter_var($id_mhs, FILTER_VALIDATE_INT)) {
    $stmt = $koneksi->prepare("DELETE from mahasiswa where id_mhs = ?");
    $stmt->bind_param("i", $id_mhs);
    $stmt->execute();
    header("location: ../index-admin.php");
} else {
    header("location: ../cred/notvalid.php");
}


?>