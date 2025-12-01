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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-indigo-100 via-white to-cyan-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-gray-800 dark:text-gray-100 transition-all duration-300 ease-in-out min-h-screen">

    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 w-64 h-screen bg-base-200 text-base-content shadow-2xl z-40 overflow-y-auto p-0 flex flex-col">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-6 shadow-lg sticky top-0">
            <a href="{{ route('manage.index') }}" class="text-2xl font-bold flex items-center gap-2 hover:scale-105 transition-transform">
                <i class="fa-solid fa-bolt text-yellow-300"></i> FlashTech
            </a>
        </div>

        <!-- User Info Section -->
        <div class="p-4 border-b border-base-300 bg-base-100/50">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="avatar placeholder">
                        <div class="bg-indigo-500 text-white w-10 rounded-full flex items-center justify-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth('admin')->user()?->name ?? 'User') }}&background=667eea&color=fff" alt="{{ auth('admin')->user()?->name ?? 'User' }}" class="profile-avatar">
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium">{{ auth('admin')->user()?->name ?? 'Guest' }}</p>
                        <p class="text-xs text-gray-500">
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
            <a href="{{ route('manage.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors @if(request()->routeIs('manage.*')) bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-300 font-semibold @endif">
                <i class="fa-solid fa-chart-line text-lg"></i>
                <span>Thống kê</span>
            </a>

            <a href="{{ route('admin.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors @if(request()->routeIs('admin.*')) bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-300 font-semibold @endif">
                <i class="fa-solid fa-user text-lg"></i>
                <span>Admin</span>
            </a>

            <a href="{{ route('customers.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors @if(request()->routeIs('customer.*')) bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-300 font-semibold @endif">
                <i class="fa-solid fa-users text-lg"></i>
                <span>Khách hàng</span>
            </a>

            <!-- Products Dropdown -->
            <div class="collapse collapse-arrow bg-base-200 dark:bg-base-300/30 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30">
                <input type="checkbox" class="peer" @if(request()->routeIs('product.*', 'laptop.*', 'component.*', 'accessories.*')) checked @endif />
                <div class="collapse-title flex items-center gap-3 p-3 peer-checked:bg-indigo-100 dark:peer-checked:bg-indigo-900/30 peer-checked:text-indigo-600 dark:peer-checked:text-indigo-300 font-semibold">
                    <i class="fa-solid fa-box text-lg"></i>
                    <span>Sản phẩm</span>
                </div>
                <div class="collapse-content space-y-2 pl-6">
                    <a href="{{ route('product.index') }}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-colors text-sm @if(request()->routeIs('product.index')) text-indigo-600 dark:text-indigo-300 font-semibold @endif">
                        <i class="fa-solid fa-box"></i> Danh sách sản phẩm
                    </a>
                    <a href="{{ route('laptop.index') }}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-colors text-sm @if(request()->routeIs('laptop.*')) text-indigo-600 dark:text-indigo-300 font-semibold @endif">
                        <i class="fa-solid fa-laptop"></i> Laptop
                    </a>
                    <a href="{{ route('component.index') }}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-colors text-sm @if(request()->routeIs('component.*')) text-indigo-600 dark:text-indigo-300 font-semibold @endif">
                        <i class="fa-solid fa-microchip"></i> Linh kiện
                    </a>
                    <a href="{{ route('accessories.index') }}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-colors text-sm @if(request()->routeIs('accessories.*')) text-indigo-600 dark:text-indigo-300 font-semibold @endif">
                        <i class="fa-solid fa-keyboard"></i> Phụ kiện
                    </a>
                </div>
            </div>

            <a href="{{ route('brand.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors @if(request()->routeIs('brand.*')) bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-300 font-semibold @endif">
                <i class="fa-solid fa-copyright text-lg"></i>
                <span>Thương hiệu</span>
            </a>

            <a href="{{ route('order.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors @if(request()->routeIs('order.*')) bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-300 font-semibold @endif">
                <i class="fa-solid fa-cart-shopping text-lg"></i>
                <span>Đơn hàng</span>
            </a>
        </nav>

        <!-- Logout Section -->
        <div class="border-t border-base-300 p-4 space-y-2">
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="button" onclick="confirmLogout()" class="w-full flex items-center justify-center gap-2 btn btn-outline btn-error btn-sm rounded-lg">
                    <i class="fa-solid fa-sign-out-alt"></i>
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
    </script>
</body>
</html>
