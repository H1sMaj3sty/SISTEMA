<?php 
include 'koneksi.php';

$id_user = $_POST['id_user'];
$username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
$password = $_POST['password'];

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $koneksi->prepare('UPDATE kredensial SET username = ?, password = ? WHERE id_user = ?');
$stmt->bind_param('ssi', $username, $hash, $id_user);
$stmt->execute();

header("location: ../list-user.php");
?>