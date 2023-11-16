<?php
include 'koneksi.php';

$username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
$password = $_POST['password'];

$stmt = $koneksi->prepare("SELECT * FROM kredensial WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) < 1) {
    echo "<script>
    alert('Username does not exist');window.location.href='../index.php';
    </script>";
    exit();
}

$user = mysqli_fetch_assoc($result);
if (!password_verify($password, $user["password"])) {
    echo "<script>
    alert('Password is incorrect');window.location.href='../index.php';
    </script>";
    exit();
}

session_start();

if ($user['status'] == 'ADMIN') {
    session_regenerate_id();
    $_SESSION['$status'] = "ADMIN";
    session_write_close();
    header('Location: ../index-admin.php');
    exit();
} else if ($user['status'] == 'USER') {
    session_regenerate_id();
    $_SESSION['$status'] = "USER";
    session_write_close();
    header('Location: ../index-user.php');
    exit();
}
?>