<?php 
session_start();

if ($_SESSION['$status'] != "ADMIN") {
    header('Location: notuser.php');
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
<form method="post" action="./backend/simpan-tambah-data.php" class="bg-white shadow-lg rounded p-4">
<h2 class="text-2xl font-bold text-center">Mahasiswa</h2>
        <table class="w-full">
            <tr class="border-b">
                <td class="w-1/4 p-2 text-left font-semibold">NIM</td>
                <td class="w-3/4 p-2"><input type="text" name="nim" required class="w-full border-2 rounded px-2 py-1"></td>
            </tr>
            <tr class="border-b">
                <td class="w-1/4 p-2 text-left font-semibold">NAMA</td>
                <td class="w-3/4 p-2"><input type="text" name="nama" required class="w-full border-2 rounded px-2 py-1"></td>
            </tr>
            <tr class="border-b">
                <td class="w-1/4 p-2 text-left font-semibold">JENIS KELAMIN</td>
                <td class="w-3/4 p-2">
                    <input type="radio" name="jenis_kelamin" value="L" required class="mr-1">Laki-Laki
                    <input type="radio" name="jenis_kelamin" value="P" required class="mr-1">Perempuan
                </td>
            </tr>
            <tr class="border-b">
                <td class="w-1/4 p-2 text-left font-semibold">JURUSAN</td>
                <td class="w-3/4 p-2">
                    <select name="jurusan" required class="w-full border-2 rounded px-2 py-1">
                        <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                        <option value="TEKNIK MESIN">TEKNIK MESIN</option>
                        <option value="TEKNIK KIMIA">TEKNIK KIMIA</option>
                    </select>
                </td>
            </tr>
            <tr class="border-b">
                <td class="w-1/4 p-2 text-left font-semibold">ALAMAT</td>
                <td class="w-3/4 p-2"><input type="text" name="alamat" required class="w-full border-2 rounded px-2 py-1"></td>
            </tr>
            <tr class="border-b">
                <td class="w-1/4 p-2 text-left font-semibold">NAMA WALI</td>
                <td class="w-3/4 p-2"><input type="text" name="nama_wali" required class="w-full border-2 rounded px-2 py-1"></td>
            </tr>
            <tr>
                <td colspan="2" class="p-2 text-center">
                    <button type="submit" value="simpan" class="bg-green-500 hover:bg-red-600 text-white px-4 py-2 rounded">SIMPAN</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
