<?php 
session_start();

if ($_SESSION['$status'] != "ADMIN") {
    header('Location: ../cred/notuser.php');
}
?>


<?php
include '../backend/koneksi.php';
$id = $_POST['id_user'];
$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
if(filter_var($id, FILTER_VALIDATE_INT)) {
    $stmt = $koneksi->prepare("SELECT * FROM kredensial WHERE id_user = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    header("location: ../cred/notvalid.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA</title>
    <!-- Add Tailwind CSS CDN link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <form method="post" action="../backend/edit-user.php" class="bg-white shadow-lg rounded p-4">
            <input type="hidden" value="<?php echo $row['id_user']; ?>" name="id_user">
            <table class="w-full">
                <tr class="border-b">
                    <td class="w-1/4 p-2 text-left font-semibold">USERNAME</td>
                    <td class="w-3/4 p-2"><input type="text" value="<?php echo $row['username']; ?>" name="username" class="w-full border-2 rounded px-2 py-1" required></td>
                </tr>
                <tr class="border-b">
                    <td class="w-1/4 p-2 text-left font-semibold">NEW PASSWORD</td>
                    <td class="w-3/4 p-2"><input type="password" name="password" class="w-full border-2 rounded px-2 py-1" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="p-2 text-center">
                        <button type="submit" value="simpan" class="bg-green-500 hover:bg-red-600 text-white px-4 py-2 rounded">SIMPAN PERUBAHAN</button>
                        <a href="../list-user.php" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
