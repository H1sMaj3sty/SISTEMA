<?php 
session_start();

if ($_SESSION['$status'] != "ADMIN") {
    header('Location: notuser.php');
}
?>


<?php
include './backend/koneksi.php';
$id = $_POST['id_wali'];
$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
if(filter_var($id, FILTER_VALIDATE_INT)) {
    $stmt = $koneksi->prepare("SELECT * FROM wali_mahasiswa WHERE id_wali = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    header("location: notvalid.php");
}


function active_radio_button($value, $input)
{
    $result = $value == $input ? 'checked' : '';
    return $result;
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
        <form method="post" action="./backend/edit-wali.php" class="bg-white shadow-lg rounded p-4">
            <input type="hidden" value="<?php echo $row['id_wali']; ?>" name="id_wali">
            <table class="w-full">
                <tr class="border-b">
                    <td class="w-1/4 p-2 text-left font-semibold">NAMA</td>
                    <td class="w-3/4 p-2"><input type="text" value="<?php echo $row['nama_wali']; ?>" name="nama_wali" class="w-full border-2 rounded px-2 py-1" required></td>
                </tr>
                <tr class="border-b">
                    <td class="w-1/4 p-2 text-left font-semibold">JENIS KELAMIN</td>
                    <td class="w-3/4 p-2">
                        <div class="flex items-center">
                            <input type="radio" name="jenis_kelamin" value="L" <?php echo active_radio_button("L", $row['jenis_kelamin']) ?> class="mr-1" required>
                            <label class="mr-4">Laki-Laki</label>
                            <input type="radio" name="jenis_kelamin" value="P" <?php echo active_radio_button("P", $row['jenis_kelamin']) ?> class="mr-1" required>
                            <label>Perempuan</label>
                        </div>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="w-1/4 p-2 text-left font-semibold">ALAMAT</td>
                    <td class="w-3/4 p-2"><input value="<?php echo $row['alamat_wali']; ?>" type="text" name="alamat_wali" class="w-full border-2 rounded px-2 py-1" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="p-2 text-center">
                        <button type="submit" value="simpan" class="bg-green-500 hover:bg-red-600 text-white px-4 py-2 rounded">SIMPAN PERUBAHAN</button>
                        <a href="index-admin.php" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
