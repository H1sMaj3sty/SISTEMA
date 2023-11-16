<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">

<div class="container mx-auto flex justify-center items-center h-screen">
    <form action="./backend/submit-login.php" method="post" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <h2 class="text-center text-2xl mb-4">Login Page</h2>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Username
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Enter Username" name="username" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-0 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Enter Password" name="password" required>
        </div>
        <div class="flex items-center justify-center flex-col">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-4" type="submit">
                Login
            </button>
            <p class="text-center">Don't have an account? <a href="signup.php" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Sign Up</a></p>
        </div>
    </form>
</div>

</body>
</html>
