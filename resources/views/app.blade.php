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

            const savedTheme = localStorage.getItem("theme");
            if (savedTheme) {
                htmlElement.setAttribute("data-theme", savedTheme);
                themeIcon.className = savedTheme === "light" ? "sun-icon" : "moon-icon";
            }

            themeToggle.addEventListener("click", function () {
                let currentTheme = htmlElement.getAttribute("data-theme");
                let newTheme = currentTheme === "light" ? "dark" : "light";
                htmlElement.setAttribute("data-theme", newTheme);
                localStorage.setItem("theme", newTheme);
                themeIcon.className = newTheme === "light" ? "sun-icon" : "moon-icon";
            });
        });
    </script>
    <style>
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
        .theme-toggle .sun-icon::before {
            content: "☀️";
        }
        .theme-toggle .moon-icon::before {
            content: "🌙";
        }

    </style>
</head>
<body>
<div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Navbar -->
        <div class="navbar bg-base-100 shadow-sm">
            <div class="flex-none">
                <label for="my-drawer" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </label>
            </div>
            <div class="flex-1">
                <a class="btn btn-ghost text-2xl font-bold tracking-wide text-primary hover:text-primary-focus transition-colors duration-300" href="{{ url('/manage') }}">
                    <span class="font-bold text-3xl mr-3 bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text text-transparent">
                            LCAS
                    </span></a>
            </div>

            <div class="flex gap-2">
                <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"
                                 alt="Avatar">
                        </div>
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                        <li><a href="">Profile</a></li>

                        <li><a href="{{route('admin.logout')}}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <!-- Sidebar Menu -->
    <div class="drawer-side">
        <label for="my-drawer" class="drawer-overlay"></label>
        <ul class="menu p-4 w-64 min-h-full bg-base-200">
            <!-- Home -->
            <li>
                <a href="{{ route('manage.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                </a>
            </li>
            <!-- Admin -->
            <li>
                <a href="{{ route('admin.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 11c0-3.866-3.134-7-7-7S-2 7.134-2 11c0 3.866 3.134 7 7 7s7-3.134 7-7zm0 0v10m4-6l4-4m0 0l-4-4m4 4H8" />
                    </svg>
                    Admin
                </a>
            </li>

            <!-- Dropdown Products -->
            <li>
                <details>
                    <summary>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 3h18M3 9h18m-9 6h9M3 21h9" />
                        </svg>
                        Products
                    </summary>
                    <ul class="ml-4">
                        <li><a href="{{ route('laptop.index') }}">Laptops</a></li>
                        <li><a href="{{ route('component.index') }}">Components</a></li>
                        <li><a href="{{ route('accessories.index') }}">Accessories</a></li>
                    </ul>
                </details>
            </li>

            <!-- Brands -->
            <li>
                <a href="{{ route('brand.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h18M9 9h6m-6 6h6" />
                    </svg>
                    Brands
                </a>
            </li>

            <!-- Colors -->
            <li>
                <a href="{{ route('color.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m-8-8h16" />
                    </svg>
                    Colors
                </a>
            </li>

            <!-- Customer -->
            <li>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 14l-4-4m0 0l4-4m-4 4h16" />
                    </svg>
                    Customer
                </a>
            </li>

            <!-- Order -->
            <li>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20 13V6a1 1 0 00-1-1H5a1 1 0 00-1 1v7m0 0a4 4 0 004 4h6a4 4 0 004-4m0 0V6a1 1 0 00-1-1H5a1 1 0 00-1 1v7" />
                    </svg>
                    Order
                </a>
            </li>

            <!-- Employee -->
            <li>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7" />
                    </svg>
                    Employee
                </a>
            </li>

            <!-- Salary -->
            <li>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 10h11m-6 4h6m-3 4h3m-9-8a5 5 0 0110 0m1 4a4 4 0 01-8 0m1 4a3 3 0 016 0" />
                    </svg>
                    Salary
                </a>
            </li>
        </ul>
    </div>
</div>
<button id="theme-toggle" class="theme-toggle">
    <span id="theme-icon" class="sun-icon"></span>
</button>
<div class="p-6">
    @yield("content")
</div>
<script src="https://unpkg.com/feather-icons"></script>

</body>
</html>
