<?php
include 'koneksi.php';
$name = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
$password = $_POST['password'];
$status = "USER";

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $koneksi->prepare("INSERT INTO kredensial (username, password, status) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $hash, $status);
$stmt->execute();

echo "<script>alert('Account Registered');window.location.href='../index.php';</script>";
?>
?>