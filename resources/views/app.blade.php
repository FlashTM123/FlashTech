@vite(['resources/css/app.css', 'resources/js/app.js'])


    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const themeToggle = document.getElementById("theme-toggle");
            const themeIcon = document.getElementById("theme-icon");
            const htmlElement = document.documentElement;

            const savedTheme = localStorage.getItem("theme") || "light";
            htmlElement.setAttribute("data-theme", savedTheme);
            themeIcon.textContent = savedTheme === "light" ? "☀️" : "🌙";

            themeToggle.addEventListener("click", function () {
                let currentTheme = htmlElement.getAttribute("data-theme");
                let newTheme = currentTheme === "light" ? "dark" : "light";
                htmlElement.setAttribute("data-theme", newTheme);
                localStorage.setItem("theme", newTheme);
                themeIcon.textContent = newTheme === "light" ? "☀️" : "🌙";
            });
        });
    </script>
    <style>
        /* Định dạng chung */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        html[data-theme="light"] {
            background-color: #ffffff;
            color: #000000;
        }

        html[data-theme="dark"] {
            background-color: #111827;
            color: #ffffff;
        }

        /* Navbar */
        .navbar {
            width: 100%;
            height: 60px;
            background-color: #1f2937;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        html[data-theme="light"] .navbar {
            background-color: #f8f9fa;
            color: black;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: #1f2937;
            color: white;
            padding: 0;
            position: fixed;
            left: 0;
            top: 60px;
            bottom: 0;
            overflow-y: auto;
        }

        html[data-theme="light"] .sidebar {
            background-color: #f8f9fa;
            color: black;
        }

        /* Content */
        .content {
            margin-left: 250px;
            padding: 80px 20px 20px;
            min-height: 100vh;
        }

        /* Theme Toggle */
        .theme-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        html[data-theme="dark"] .theme-toggle {
            background-color: #333;
            color: white;
        }
    </style>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-base-100 text-base-content">

<!-- Navbar -->
<div class="navbar shadow-lg">
    <div>
        <a class="btn btn-ghost normal-case text-2xl font-bold tracking-wide text-primary hover:text-primary-focus transition-colors duration-300" href="{{ route('manage.index') }}">
            <span class="font-bold text-3xl mr-3 bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text text-transparent">
                LCAS
            </span>
        </a>
    </div>
    <div class="flex gap-2">
        Xin chào, {{ auth('admin')->user()?->name ?? 'Guest' }}
    </div>
</div>

<!-- Sidebar -->
<div class="sidebar bg-base-200 text-base-content shadow-lg">
    <ul class="menu p-4 w-64 min-h-full">
        <li><a href="{{ route('manage.index') }}"><i class="fa-solid fa-house"></i> Home</a></li>
        <li><a href="{{ route('admin.index') }}"><i class="fa-solid fa-user"></i> Admin</a></li>
        <li>
            <details>
                <summary><i class="fa-solid fa-box"></i> Products</summary>
                <ul class="ml-4">
                    <li><a href="{{ route('product.index')}}"><i class="fa-solid fa-box"></i> Product List</a></li>
                    <li><a href="{{ route('laptop.index') }}"><i class="fa-solid fa-laptop"></i> Laptop</a></li>
                    <li><a href="{{ route('component.index') }}"><i class="fa-solid fa-box"></i> Components</a></li>
                    <li><a href="{{ route('accessories.index') }}"><i class="fa-solid fa-keyboard"></i> Accessories</a></li>
                </ul>
            </details>
        </li>
        <li><a href="{{ route('brand.index') }}"><i class="fa-solid fa-copyright"></i> Brands</a></li>
        <li><a href="{{ route('color.index') }}"><i class="fa-solid fa-palette"></i> Colors</a></li>
        <li><a href="{{ route('customers.index') }}"><i class="fa-solid fa-users"></i> Customer</a></li>
        <li><a href="{{ route('order.index')}}"><i class="fa-solid fa-cart-shopping"></i> Order</a></li>
        <li><a href="{{ route('employees.index') }}"><i class="fa-solid fa-user-tie"></i> Employee</a></li>
    </ul>
</div>

<!-- Nội dung chính -->
<div class="content">
    <div class="p-6">
        @yield("content")
    </div>
    <div class="text-center mt-6 text-gray-500 text-sm">
        <aside>
            <p>Copyright © {{ date('Y') }} - All right reserved by FlashTM's teams</p>
        </aside>
    </div>
</div>


<!-- Nút chuyển đổi theme -->
<button id="theme-toggle" class="theme-toggle">
    <span id="theme-icon">☀️</span>
</button>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmLogout() {
        Swal.fire({
            title: "Are you sure?",
            text: "You will be logged out!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Log out!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("logout-form").submit();
            }
        });
    }
</script>

</body>
</html>
