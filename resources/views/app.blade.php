@vite(['resources/css/app.css', 'resources/js/app.js'])

<!doctype html>
<html lang="en">
<head>
    @livewireStyles
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" data-theme="dark">
    <title>@yield("title") | FlashTech</title>

    <!-- Font & Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Animation Styles -->
    <style>
        * {
            transition: all 0.3s ease;
        }

        /* Smooth Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #764ba2 0%, #667eea 100%);
        }

        /* Sidebar Animations */
        .sidebar-item {
            position: relative;
            overflow: hidden;
        }

        .sidebar-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s ease;
        }

        .sidebar-item:hover::before {
            left: 100%;
        }

        /* Pulse Animation */
        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7);
            }
            50% {
                box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
            }
        }

        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }

        /* Float Animation */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        .float-animate {
            animation: float 3s ease-in-out infinite;
        }

        /* Slide In Animation */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .slide-in-left {
            animation: slideInLeft 0.5s ease-out;
        }

        /* Fade In Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 0.3s ease-out;
        }

        /* Gradient Text Animation */
        @keyframes gradient-shift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .gradient-text {
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #667eea);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient-shift 3s ease infinite;
        }

        /* Hover Scale */
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        /* Icon Rotate */
        .icon-rotate {
            transition: transform 0.3s ease;
        }

        .icon-rotate:hover {
            transform: rotate(360deg);
        }

        /* Badge Pulse */
        @keyframes badge-pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        .badge-pulse {
            animation: badge-pulse 1.5s ease-in-out infinite;
        }

        /* Menu Item Active Indicator */
        .menu-active-indicator {
            position: absolute;
            left: 0;
            width: 4px;
            height: 0;
            background: linear-gradient(180deg, #667eea, #764ba2);
            transition: height 0.3s ease;
        }

        .sidebar-item.active .menu-active-indicator {
            height: 100%;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-100 via-white to-cyan-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-gray-800 dark:text-gray-100 transition-all duration-300 ease-in-out min-h-screen">

    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 w-64 h-screen bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 dark:from-gray-950 dark:via-gray-900 dark:to-gray-950 text-base-content shadow-2xl z-40 overflow-y-auto p-0 flex flex-col border-r border-indigo-600/20">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white p-6 shadow-2xl sticky top-0 z-50">
            <a href="{{ route('manage.index') }}" class="text-2xl font-bold flex items-center gap-3 hover:scale-110 transition-all group cursor-pointer">
                <div class="w-10 h-10 rounded-lg bg-white/20 backdrop-blur-sm flex items-center justify-center group-hover:rotate-12">
                    <i class="fa-solid fa-bolt text-yellow-300 group-hover:scale-125"></i>
                </div>
                <span class="gradient-text font-black">FlashTech</span>
            </a>
        </div>

        <!-- User Info Section -->
        <div class="p-5 border-b border-indigo-600/20 bg-gradient-to-r from-gray-800/50 to-gray-900/50 backdrop-blur-sm hover-scale">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="avatar placeholder">
                        <div class="bg-gradient-to-br from-indigo-500 to-purple-600 text-white w-12 rounded-full flex items-center justify-center shadow-lg hover-scale">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth('admin')->user()?->name ?? 'User') }}&background=667eea&color=fff" alt="{{ auth('admin')->user()?->name ?? 'User' }}" class="profile-avatar">
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-bold text-white">{{ auth('admin')->user()?->name ?? 'Guest' }}</p>
                        <p class="text-xs text-gray-400 badge badge-sm badge-indigo">
                            @php
                                $role = auth('admin')->user()?->role ?? 'guest';
                                $roleLabel = match($role) {
                                    'admin' => '👑 Admin',
                                    'moderator' => '🛡️ Moderator',
                                    'employee' => '💬 Employee',
                                    default => '❓ User'
                                };
                            @endphp
                            {{ $roleLabel }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Section -->
        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <a href="{{ route('manage.index') }}" class="sidebar-item @if(request()->routeIs('manage.*')) active @endif flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-600/20 transition-all relative group">
                <div class="menu-active-indicator"></div>
                <i class="fa-solid fa-chart-line text-lg group-hover:scale-125 icon-rotate"></i>
                <span class="font-semibold">Thống kê</span>
            </a>

            <a href="{{ route('admin.index') }}" class="sidebar-item @if(request()->routeIs('admin.*')) active @endif flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-600/20 transition-all relative group">
                <div class="menu-active-indicator"></div>
                <i class="fa-solid fa-user text-lg group-hover:scale-125 icon-rotate"></i>
                <span class="font-semibold">Admin</span>
            </a>

            <a href="{{ route('customers.index') }}" class="sidebar-item @if(request()->routeIs('customer.*')) active @endif flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-600/20 transition-all relative group">
                <div class="menu-active-indicator"></div>
                <i class="fa-solid fa-users text-lg group-hover:scale-125 icon-rotate"></i>
                <span class="font-semibold">Khách hàng</span>
            </a>

            <!-- Products Dropdown -->
            <div class="collapse collapse-arrow bg-gray-800/50 dark:bg-gray-900/50 rounded-xl hover:bg-indigo-600/20 border border-gray-700/50 hover:border-indigo-600/30">
                <input type="checkbox" class="peer dropdown-toggle" @if(request()->routeIs('product.*', 'laptop.*', 'component.*', 'accessories.*')) checked @endif />
                <div class="collapse-title flex items-center gap-3 p-3 peer-checked:bg-indigo-600/30 peer-checked:text-indigo-300 font-semibold">
                    <i class="fa-solid fa-box text-lg icon-rotate"></i>
                    <span>Sản phẩm</span>
                </div>
                <div class="collapse-content space-y-2 pl-6 animate-fadeIn">
                    <a href="{{ route('product.index') }}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-indigo-600/20 transition-all text-sm hover-scale @if(request()->routeIs('product.index')) text-indigo-300 font-semibold @endif">
                        <i class="fa-solid fa-box icon-rotate"></i> Danh sách sản phẩm
                    </a>
                    <a href="{{ route('laptop.index') }}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-indigo-600/20 transition-all text-sm hover-scale @if(request()->routeIs('laptop.*')) text-indigo-300 font-semibold @endif">
                        <i class="fa-solid fa-laptop icon-rotate"></i> Laptop
                    </a>
                    <a href="{{ route('component.index') }}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-indigo-600/20 transition-all text-sm hover-scale @if(request()->routeIs('component.*')) text-indigo-300 font-semibold @endif">
                        <i class="fa-solid fa-microchip icon-rotate"></i> Linh kiện
                    </a>
                    <a href="{{ route('accessories.index') }}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-indigo-600/20 transition-all text-sm hover-scale @if(request()->routeIs('accessories.*')) text-indigo-300 font-semibold @endif">
                        <i class="fa-solid fa-keyboard icon-rotate"></i> Phụ kiện
                    </a>
                </div>
            </div>

            <a href="{{ route('brand.index') }}" class="sidebar-item @if(request()->routeIs('brand.*')) active @endif flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-600/20 transition-all relative group">
                <div class="menu-active-indicator"></div>
                <i class="fa-solid fa-copyright text-lg group-hover:scale-125 icon-rotate"></i>
                <span class="font-semibold">Thương hiệu</span>
            </a>

            <a href="{{ route('order.index') }}" class="sidebar-item @if(request()->routeIs('order.*')) active @endif flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-600/20 transition-all relative group pulse-glow">
                <div class="menu-active-indicator"></div>
                <i class="fa-solid fa-cart-shopping text-lg group-hover:scale-125 icon-rotate badge-pulse"></i>
                <span class="font-semibold">Đơn hàng</span>
            </a>
        </nav>

        <!-- Logout Section -->
        <div class="border-t border-indigo-600/20 p-4 space-y-2 bg-gradient-to-r from-gray-800/50 to-gray-900/50 backdrop-blur-sm">
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="button" onclick="confirmLogout()" class="w-full flex items-center justify-center gap-2 btn btn-outline btn-error btn-sm rounded-lg hover:scale-105 transition-all hover:shadow-lg hover:shadow-red-500/50 font-bold">
                    <i class="fa-solid fa-sign-out-alt icon-rotate"></i>
                    <span>Đăng xuất</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 p-6">
        <div class="bg-base-100 rounded-xl shadow-lg p-6 border border-base-300 min-h-[calc(100vh-3rem)]">
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

        // Page Transition Animation
        document.addEventListener('DOMContentLoaded', function () {
            // Add fade-in animation to page load
            const mainContent = document.querySelector('main');
            if (mainContent) {
                mainContent.classList.add('fade-in');
            }

            // Add slide-in animation to sidebar items
            const sidebarItems = document.querySelectorAll('.sidebar-item');
            sidebarItems.forEach((item, index) => {
                item.style.animation = `slideInLeft ${0.3 + (index * 0.05)}s ease-out`;
            });

            // Add smooth hover effects to buttons
            const buttons = document.querySelectorAll('button, a');
            buttons.forEach(btn => {
                btn.addEventListener('mouseenter', function () {
                    this.style.transform = 'translateY(-2px)';
                });
                btn.addEventListener('mouseleave', function () {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Smooth scroll behavior
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            // Active menu indicator
            updateActiveMenuItem();

            // Watch for navigation changes
            window.addEventListener('beforeunload', function () {
                const sidebar = document.querySelector('aside');
                if (sidebar) {
                    sidebar.style.opacity = '0.5';
                }
            });
        });

        function updateActiveMenuItem() {
            const currentPath = window.location.pathname;
            const menuItems = document.querySelectorAll('.sidebar-item');
            menuItems.forEach(item => {
                const href = item.getAttribute('href');
                if (href && currentPath.includes(href.split('/').pop())) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        // Scroll animation for page content
        window.addEventListener('scroll', function () {
            const scrollPosition = window.scrollY;
            const elements = document.querySelectorAll('[data-scroll]');

            elements.forEach(element => {
                const elementPosition = element.offsetTop;
                const elementHeight = element.offsetHeight;

                if (scrollPosition + window.innerHeight > elementPosition) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        });
    </script>
</body>
</html>
