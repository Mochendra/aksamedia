<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-xl font-semibold text-gray-800 dark:text-white">Dashboard</a>
            <div class="relative">
                <!-- Display the username -->
                <button id="userDropdown" class="flex items-center space-x-2 text-gray-800 dark:text-white focus:outline-none">
                    <span id="usernameDisplay"></span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown -->
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-2 z-20">
                    <a href="#" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700" id="logoutBtn">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <<div class="container mx-auto p-6">
        <form id="searchForm" class="mb-6">
            <input type="text" id="searchInput" placeholder="Search..." class="p-2 border rounded" value="">
            <button type="submit" class="p-2 bg-blue-500 text-white rounded">Search</button>
        </form>

        <div id="dataContainer">

      <!-- Data table or list here -->
    </div>

    <div class="pagination">
        <button id="prevPage" class="p-2 bg-blue-500 text-white rounded">Previous</button>
        <span id="currentPage">Page 1</span>
        <button id="nextPage" class="p-2 bg-blue-500 text-white rounded">Next</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('search') || '';
        const currentPage = parseInt(urlParams.get('page')) || 1;

        // Set initial values
        document.getElementById('searchInput').value = searchQuery;
        document.getElementById('currentPage').textContent = `Page ${currentPage}`;

        // Handle search form submission
        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const query = document.getElementById('searchInput').value;
            updateUrl({ search: query, page: 1 });
        });

        // Handle pagination
        document.getElementById('prevPage').addEventListener('click', function() {
            updateUrl({ search: searchQuery, page: currentPage - 1 });
        });

        document.getElementById('nextPage').addEventListener('click', function() {
            updateUrl({ search: searchQuery, page: currentPage + 1 });
        });

        function updateUrl(params) {
            const newUrl = new URL(window.location.href);
            for (const [key, value] of Object.entries(params)) {
                if (value) {
                    newUrl.searchParams.set(key, value);
                } else {
                    newUrl.searchParams.delete(key);
                }
            }
            window.history.pushState({}, '', newUrl);
            // Trigger data fetch or update
        }
    });
</script>
</body>
</html>
