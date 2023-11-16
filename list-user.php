<?php 
session_start();

if ($_SESSION['$status'] != "ADMIN") {
    header('Location: ./cred/notuser.php');
}
?>

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
    <a href="index-admin.php" class="hover:bg-gray-500 px-4 py-2 rounded">Dashboard</a>
    <a href="./backend/logout.php" class="bg-red-700 hover:bg-red-800 text-white px-4 py-2 rounded flex items-center mr-5">
    <svg class="w-4 h-4 mr-25" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h8a1 1 0 011 1v3a1 1 0 11-2 0V5H5v10h6v-2a1 1 0 112 0v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm11.707 3.293a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L12.586 9H7a1 1 0 110-2h5.586l-1.293-1.293a1 1 0 011.414-1.414l3 3z" clip-rule="evenodd"></path>
    </svg>
    Log Out
    </a>
</nav>

<div class="mt-4 bg-white shadow-lg rounded p-4">

    <h2 class="text-2xl font-bold text-center">List User</h2>

    <table class="w-full mt-4">
        <tr class="rounded bg-red-600 text-white">
            <th class="p-2 rounded-l-md">NO</th>
            <th class="p-2">USERNAME</th>
            <th class="p-2">STATUS</th>
            <th class="p-2">ACTION</th>
        </tr>

        <?php
        include './backend/koneksi.php';
        $mahasiswa = mysqli_query($koneksi, "SELECT * FROM kredensial");
        $no = 1;
        foreach ($mahasiswa as $row) {
            echo "<tr class='border-b'>
                    <td class='p-2 border text-center'>$no</td>
                    <td class='p-2 border'>" . $row['username'] . "</td>
                    <td class='p-2 border'>" . $row['status'] . "</td>
                    <td class='p-2 flex justify-center border'>
                    <form action='./form-edit/form-edit-user.php' method='post'>
                    <input type='hidden' name='id_user' value='" . $row['id_user'] . "'>
                    <button type='submit' class='bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded  mr-1'>EDIT</button>
                    </form>
                    <a href='#' onclick='openModal(event, " . $row['id_user'] . ")' class='bg-red-700 hover:bg-gray-600 text-white px-2 py-1 rounded ml-1'>DELETE</a>
                    </td>
                    </tr>";
            $no++;
        } 
        ?>
    </table>

    <div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-red-500 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    Warning
                    </h3>
            </div>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">
                        Are you sure you want to do this? You cannot undo.
                    </p>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <a id="deleteLink" href="#" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Yes
                </a>
                <button onclick="closeModal()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function openModal(event, id_user) {
    event.preventDefault();
    document.getElementById('modal').style.display = 'block';
    document.getElementById('deleteLink').href = './backend/delete-user.php?id_user=' + id_user;
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}
</script>
</body>

</html>
