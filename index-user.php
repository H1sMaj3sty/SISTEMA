<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

<header class="flex justify-center items-center py-4 bg-gray-700 text-white">
    <h1 class="text-4xl font-bold">SISTEM INFORMASI MAHASISWA</h1>
</header>

<nav class="flex justify-between items-center py-2 bg-gray-600 text-white">
    <a href="index-user.php" class="hover:bg-gray-500 px-4 py-2 rounded">Dashboard</a>
    <a href="./backend/logout.php" class="bg-red-700 hover:bg-red-800 text-white px-4 py-2 rounded flex items-center mr-5">
    <svg class="w-4 h-4 mr-25" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h8a1 1 0 011 1v3a1 1 0 11-2 0V5H5v10h6v-2a1 1 0 112 0v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm11.707 3.293a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L12.586 9H7a1 1 0 110-2h5.586l-1.293-1.293a1 1 0 011.414-1.414l3 3z" clip-rule="evenodd"></path>
    </svg>
    Log Out
    </a>
</nav>

<div class="mt-4 bg-white shadow-lg rounded p-4">

    <h2 class="text-2xl font-bold text-center">List Mahasiswa</h2>

    <table class="w-full mt-4">
        <tr class="rounded bg-red-600 text-white">
            <th class="p-2 rounded-l-md">NO</th>
            <th class="p-2">NIM</th>
            <th class="p-2">NAMA</th>
            <th class="p-2">GENDER</th>
            <th class="p-2">JURUSAN</th>
            <th class="p-2">NAMA WALI</th>
            <th class="p-2">ALAMAT</th>
        </tr>

        <?php
        include './backend/koneksi.php';
        $mahasiswa = mysqli_query($koneksi, "SELECT mahasiswa.*, wali_mahasiswa.nama_wali FROM mahasiswa INNER JOIN wali_mahasiswa ON mahasiswa.id_wali = wali_mahasiswa.id_wali");
        $no = 1;
        foreach ($mahasiswa as $row) {
            $jenis_kelamin = $row['jenis_kelamin'] == 'P' ? 'Perempuan' : 'Laki-Laki';
            echo "<tr class='border-b'>
                    <td class='p-2 border text-center'>$no</td>
                    <td class='p-2 border'>" . $row['nim'] . "</td>
                    <td class='p-2 border'>" . $row['nama'] . "</td>
                    <td class='p-2 border'>" . $jenis_kelamin . "</td>
                    <td class='p-2 border'>" . $row['jurusan'] . "</td>
                    <td class='p-2 border'>" . $row['nama_wali']."</td>
                    <td class='p-2 border'>" . $row['alamat'] . "</td>
                    </tr>";
            $no++;
        } 
        ?>
    </table>
</body>

</html>
