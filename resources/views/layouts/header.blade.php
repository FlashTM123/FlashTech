<div class="navbar bg-white dark:bg-gray-900 shadow-md fixed z-50 px-4 transition-all duration-300">
    <!-- Navbar Start -->
    <div class="navbar-start">
        <!-- Mobile Dropdown -->
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost text-primary hover:bg-indigo-100 dark:hover:bg-gray-800 lg:hidden">
                <i class="fa-solid fa-bars text-xl"></i>
            </label>
            <ul tabindex="0"
                class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow-lg bg-white dark:bg-gray-800 rounded-box w-52">
                <li><a class="hover:bg-indigo-100 dark:hover:bg-gray-700">Laptop</a></li>
                <li><a class="hover:bg-indigo-100 dark:hover:bg-gray-700">Linh kiện</a></li>
                <li><a class="hover:bg-indigo-100 dark:hover:bg-gray-700">Phụ kiện</a></li>
            </ul>
        </div>

        <!-- Logo -->
        <a href="{{ url('/') }}"
           class="text-3xl font-extrabold tracking-wide bg-gradient-to-r from-purple-500 to-indigo-500 bg-clip-text text-transparent flex items-center gap-2">
            <i class="fa-solid fa-bolt animate-spin-slow text-indigo-500"></i> FlashGear
        </a>
    </div>

    <!-- Navbar Center -->
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 gap-3">
            <li><a href="{{ url('/laptop') }}" class="hover:text-indigo-500 transition-colors">Laptop</a></li>
            <li><a href="{{ url('/component') }}" class="hover:text-indigo-500 transition-colors">Linh kiện</a></li>
            <li><a href="{{ url('/accessories') }}" class="hover:text-indigo-500 transition-colors">Phụ kiện</a></li>
        </ul>
    </div>

    <!-- Navbar End -->
    <div class="navbar-end gap-3">
        <!-- Cart -->
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <i class="fa-solid fa-cart-shopping text-xl"></i>
                    <span class="badge badge-sm badge-primary indicator-item">
                        @if(session()->has('customer'))
                            {{ count(session('cart', [])) }}
                        @else
                            0
                        @endif
                    </span>
                </div>
            </label>
            @if(session()->has('customer'))
                <div
                    class="mt-3 card card-compact dropdown-content w-60 bg-white dark:bg-gray-800 text-black dark:text-white shadow-lg">
                    <div class="card-body">
                        <span class="font-bold text-lg">{{ count(session('cart', [])) }} sản phẩm</span>
                        <span class="text-indigo-500">
                            Tổng: {{ number_format(array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], session('cart', [])))) }}₫
                        </span>
                        <div class="card-actions">
                            <a href="{{ route('customer.cart') }}" class="btn btn-primary btn-block">Xem giỏ hàng</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Login / Avatar -->
        @if(session()->has('customer'))
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                        <img src="{{ asset('images/' . session('customer')->image) }}" alt="Avatar" />
                    </div>
                </label>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow-lg bg-white dark:bg-gray-800 text-black dark:text-white rounded-box w-52">
                    <li><a href="{{ route('customer.profile') }}" class="hover:bg-indigo-100 dark:hover:bg-gray-700">{{ session('customer')->name }}</a></li>
                    <li>
                        <form action="{{ route('customer.logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-error w-full mt-1">Đăng xuất</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a href="{{ route('customer.login') }}" class="btn btn-outline btn-primary">Đăng nhập</a>
            <a href="{{ route('customer.register') }}" class="btn btn-outline btn-secondary">Đăng ký</a>
        @endif
    </div>
</div>
