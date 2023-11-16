<?php 
include 'koneksi.php';

$id_user = $_GET['id_user'];

if (filter_var($id_user, FILTER_VALIDATE_INT)) {
    $stmt = $koneksi->prepare('DELETE FROM kredensial WHERE id_user = ?');
    $stmt->bind_param('i', $id_user);
    $stmt->execute();
    header("location: ../list-user.php");
} else {
    header("location: ../cred/notvalid.php");
}

?>