<?php
include 'koneksi.php';

$id_wali = $_GET['id_wali'];

if (filter_var($id_wali, FILTER_VALIDATE_INT)) {
    $stmt = $koneksi->prepare("DELETE from wali_mahasiswa where id_wali = ?");
    $stmt->bind_param("i", $id_wali);
    $stmt->execute();
    header("location: ../index-admin.php");
} else {
    header("location: ../notvalid.php");
}
?>