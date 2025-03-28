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
        .navbar {
    z-index: 9999;
}
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
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body class="bg-base-100 text-base-content flex flex-col min-h-screen">
            @include('layouts.header')


            <!-- Script Carousel -->

            <main class="container mx-auto p-6 flex-1">
                @yield('content')
            </main>


            @include('layouts.footer')
            <button id="theme-toggle" class="theme-toggle">
                <span id="theme-icon" class="sun-icon"></span>
            </button>
            <!-- SweetAlert2 JS -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                @if(session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ session('success') }}',
                        confirmButtonText: 'OK'
                    });
                @endif

                @if(session('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: '{{ session('error') }}',
                        confirmButtonText: 'OK'
                    });
                @endif
            </script>
</body>
</html>
