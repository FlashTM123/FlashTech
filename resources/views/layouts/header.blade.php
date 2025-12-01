<header class="sticky top-0 z-50 backdrop-blur-xl bg-white/80 dark:bg-gray-900/80 border-b border-gray-200/20 dark:border-gray-700/20 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 h-20 flex items-center justify-between">
        <!-- Logo & Brand -->
        <div class="flex items-center gap-8">
            <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center transform group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-bolt text-white text-xl"></i>
                </div>
                <span class="font-extrabold text-xl bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-400 dark:to-purple-400 bg-clip-text text-transparent hidden sm:inline">
                    FlashTech
                </span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex gap-1">
                <a href="{{ url('/laptop') }}" class="px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-800 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all">
                    <i class="fa-solid fa-laptop mr-2"></i>Laptop
                </a>
                <a href="{{ url('/component') }}" class="px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-800 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all">
                    <i class="fa-solid fa-microchip mr-2"></i>Linh kiện
                </a>
                <a href="{{ url('/accessories') }}" class="px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-800 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all">
                    <i class="fa-solid fa-mouse mr-2"></i>Phụ kiện
                </a>
            </nav>
        </div>

        <!-- Right Actions -->
        <div class="flex items-center gap-4">
            <!-- Search (Hidden on mobile) -->
            <div class="hidden md:flex relative group">
                <input type="text" placeholder="Tìm kiếm..." class="w-64 px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 focus:outline-none focus:border-indigo-500 dark:focus:border-indigo-400 text-sm">
                <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-indigo-600 dark:hover:text-indigo-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>

            <!-- Cart Icon -->

            <!-- Auth Section -->
            @if(session()->has('customer'))
                <!-- User Dropdown -->
                <div class="relative group">
                    <button class="w-10 h-10 rounded-full ring-2 ring-indigo-200 dark:ring-indigo-900 overflow-hidden hover:ring-indigo-400 dark:hover:ring-indigo-700 transition-all">
                        <img src="{{ asset('images/' . session('customer')->image) }}" alt="{{ session('customer')->name }}" class="w-full h-full object-cover">
                    </button>
                    <div class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-200 dark:border-gray-700 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-opacity">
                        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                            <p class="font-semibold text-gray-900 dark:text-white">{{ session('customer')->name }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ session('customer')->email }}</p>
                        </div>
                        <a href="{{ route('customer.profile') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-700 transition-colors">
                            <i class="fa-solid fa-user text-indigo-600 dark:text-indigo-400"></i>
                            <span>Thông tin cá nhân</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-700 transition-colors">
                            <i class="fa-solid fa-heart text-red-500"></i>
                            <span>Danh sách yêu thích</span>
                        </a>
                        <a href="{{ route('customer.cart') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-700 transition-colors">
                            <i class="fa-solid fa-box text-orange-500"></i>
                            <span>Đơn hàng của tôi</span>
                        </a>
                        <form action="{{ route('customer.logout') }}" method="POST" class="border-t border-gray-200 dark:border-gray-700">
                            @csrf
                            <button class="w-full px-4 py-3 text-left text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors flex items-center gap-3">
                                <i class="fa-solid fa-sign-out-alt"></i>
                                <span>Đăng xuất</span>
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Auth Buttons -->
                <a href="{{ route('customer.login') }}" class="px-4 py-2 rounded-lg text-indigo-600 dark:text-indigo-400 border border-indigo-600 dark:border-indigo-400 hover:bg-indigo-600 hover:text-white dark:hover:bg-indigo-500 transition-all font-medium text-sm">
                    Đăng nhập
                </a>
                <a href="{{ route('customer.register') }}" class="px-4 py-2 rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white transition-all font-medium text-sm hidden sm:inline-block">
                    Đăng ký
                </a>
            @endif

            <!-- Mobile Menu Button -->
            <button class="lg:hidden w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-700 dark:text-gray-300 hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-all">
                <i class="fa-solid fa-bars text-lg"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <nav class="lg:hidden border-t border-gray-200 dark:border-gray-700 bg-white/95 dark:bg-gray-800/95 backdrop-blur-xl hidden">
        <div class="px-4 py-4 space-y-2">
            <a href="{{ url('/laptop') }}" class="block px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-700 transition-colors">
                <i class="fa-solid fa-laptop mr-2"></i>Laptop
            </a>
            <a href="{{ url('/component') }}" class="block px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-700 transition-colors">
                <i class="fa-solid fa-microchip mr-2"></i>Linh kiện
            </a>
            <a href="{{ url('/accessories') }}" class="block px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-700 transition-colors">
                <i class="fa-solid fa-mouse mr-2"></i>Phụ kiện
            </a>
            @if(!session()->has('customer'))
                <div class="pt-2 border-t border-gray-200 dark:border-gray-700 mt-2">
                    <a href="{{ route('customer.register') }}" class="block w-full px-4 py-2 rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-center font-medium">
                        Đăng ký
                    </a>
                </div>
            @endif
        </div>
    </nav>
</header>
