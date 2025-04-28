@vite(['resources/css/app.css', 'resources/js/app.js'])

<!doctype html>
<html lang="en">
<head>
    @livewireStyles
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title") | FlashGear Admin</title>

    <!-- Font & Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Theme switch -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const themeToggle = document.getElementById("theme-toggle");
            const themeIcon = document.getElementById("theme-icon");
            const htmlElement = document.documentElement;
            const savedTheme = localStorage.getItem("theme") || "light";

            htmlElement.setAttribute("data-theme", savedTheme);
            themeIcon.innerHTML = savedTheme === "light"
                ? '<i class="fas fa-sun"></i>'
                : '<i class="fas fa-moon"></i>';

            themeToggle.addEventListener("click", function () {
                const currentTheme = htmlElement.getAttribute("data-theme");
                const newTheme = currentTheme === "light" ? "dark" : "light";
                htmlElement.setAttribute("data-theme", newTheme);
                localStorage.setItem("theme", newTheme);
                themeIcon.innerHTML = newTheme === "light"
                    ? '<i class="fas fa-sun"></i>'
                    : '<i class="fas fa-moon"></i>';
            });
        });
    </script>
</head>
<body class="bg-gradient-to-br from-indigo-100 via-white to-cyan-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-gray-800 dark:text-gray-100 transition-all duration-300 ease-in-out min-h-screen">

    <!-- Navbar -->
    <div class="navbar fixed top-0 left-0 right-0 z-50 backdrop-blur-lg bg-white/80 dark:bg-gray-900/70 border-b border-base-300 shadow-md">
        <div class="flex-1">
            <a href="{{ route('manage.index') }}" class="text-2xl font-bold bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent tracking-wide flex items-center gap-2">
                <i class="fa-solid fa-bolt animate-spin-slow text-indigo-500 dark:text-indigo-300"></i> FlashGear Admin
            </a>
        </div>
        <div class="flex gap-4 items-center">
            <span class="font-medium">{{ auth('admin')->user()?->name ?? 'Guest' }}</span>
            @auth('admin')
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="button" class="btn btn-outline btn-error btn-sm" onclick="confirmLogout()">Log out</button>
                </form>
            @endauth
            <button id="theme-toggle" class="btn btn-circle bg-base-200 hover:bg-base-300">
                <span id="theme-icon" class="text-xl"></span>
            </button>
        </div>
    </div>

    <!-- Sidebar -->
    <aside class="fixed top-16 left-0 w-64 h-[calc(100%-4rem)] bg-base-200 text-base-content shadow-xl z-40 overflow-y-auto p-4">
        <ul class="menu gap-2">
            <li><a href="{{ route('manage.index') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
            <li><a href="{{ route('admin.index') }}"><i class="fa-solid fa-user"></i> Admin</a></li>
            <li><a href="{{ route('customers.index') }}"><i class="fa-solid fa-users"></i> Customers</a></li>

            <li>
                <details open>
                    <summary><i class="fa-solid fa-box"></i> Products</summary>
                    <ul class="ml-4">
                        <li><a href="{{ route('product.index') }}"><i class="fa-solid fa-box"></i> Product List</a></li>
                        <li><a href="{{ route('laptop.index') }}"><i class="fa-solid fa-laptop"></i> Laptop</a></li>
                        <li><a href="{{ route('component.index') }}"><i class="fa-solid fa-microchip"></i> Components</a></li>
                        <li><a href="{{ route('accessories.index') }}"><i class="fa-solid fa-keyboard"></i> Accessories</a></li>
                    </ul>
                </details>
            </li>
            <li><a href="{{ route('brand.index') }}"><i class="fa-solid fa-copyright"></i> Brands</a></li>

            <li><a href="{{ route('order.index') }}"><i class="fa-solid fa-cart-shopping"></i> Orders</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 mt-20 px-6 py-6">
        <div class="bg-base-100 rounded-xl shadow-lg p-6 border border-base-300">
            @yield("content")
        </div>
        <footer class="text-center mt-10 text-sm text-base-content opacity-70">
            © {{ date('Y') }} FlashGear. All rights reserved.
        </footer>
    </main>

    @livewireScripts
    <script>
        function confirmLogout() {
            Swal.fire({
                title: "Đăng xuất?",
                text: "Bạn sẽ bị đăng xuất khỏi hệ thống!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Đăng xuất"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("logout-form").submit();
                }
            });
        }
    </script>
</body>
</html>
