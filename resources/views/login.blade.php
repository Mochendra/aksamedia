<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Login</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-sm p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-gray-100">Login</h2>
        <form id="loginForm" class="space-y-6">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                <input type="text" id="username" placeholder="Username" class="mt-1 p-3 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input type="password" id="password" placeholder="Password" class="mt-1 p-3 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100">
            </div>
            <div>
                <button type="submit" class="w-full p-3 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition ease-in-out duration-150">Login</button>
            </div>
        </form>
    </div>
    
    <script>
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const validUsername = 'admin';
            const validPassword = 'password';

            if (username === validUsername && password === validPassword) {
                localStorage.setItem('authUser', JSON.stringify({ username }));
                window.location.href = '/dashboard';
            } else {
                alert('Invalid credentials');
            }
        });

        // Handle dark mode based on user preference
        const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        document.documentElement.classList.add(savedTheme);
    </script>
</body>
</html>
