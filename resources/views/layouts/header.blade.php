<div class="navbar bg-white dark:bg-gray-900 shadow-md fixed z-50 px-4 transition-all duration-300">
    <!-- Navbar Start -->
    <div class="navbar-start">
        <!-- Mobile Dropdown -->
        <div class="dropdown">
            <button tabindex="0" class="btn btn-ghost text-primary lg:hidden hover:bg-indigo-100 dark:hover:bg-gray-800">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
            <ul tabindex="0"
                class="menu menu-sm dropdown-content mt-4 p-3 shadow-xl bg-white dark:bg-gray-800 rounded-xl w-56 space-y-1 z-50">
                <li><a href="{{ url('/laptop') }}" class="hover:bg-indigo-100 dark:hover:bg-gray-700 rounded-md px-2 py-1">Laptop</a></li>
                <li><a href="{{ url('/component') }}" class="hover:bg-indigo-100 dark:hover:bg-gray-700 rounded-md px-2 py-1">Linh kiện</a></li>
                <li><a href="{{ url('/accessories') }}" class="hover:bg-indigo-100 dark:hover:bg-gray-700 rounded-md px-2 py-1">Phụ kiện</a></li>
            </ul>
        </div>

        <!-- Logo -->
        <a href="{{ url('/') }}"
           class="text-3xl font-extrabold tracking-wide bg-gradient-to-r from-purple-500 to-indigo-500 bg-clip-text text-transparent flex items-center gap-2">
            <i class="fa-solid fa-bolt animate-spin-slow text-indigo-500"></i> FlashTech
        </a>
    </div>

    <!-- Navbar Center -->
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 gap-4 text-base font-medium">
            <li><a href="{{ url('/laptop') }}" class="hover:text-indigo-500 transition-colors">Laptop</a></li>
            <li><a href="{{ url('/component') }}" class="hover:text-indigo-500 transition-colors">Linh kiện</a></li>
            <li><a href="{{ url('/accessories') }}" class="hover:text-indigo-500 transition-colors">Phụ kiện</a></li>
        </ul>
    </div>

    <!-- Navbar End -->
    <div class="navbar-end gap-3">
        <!-- Cart -->
        
        <!-- Login / Avatar -->
        @if(session()->has('customer'))
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle">
                <livewire:cart-icon />
            </label>
            @livewire('cart-drop-down')
        </div>
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full ring ring-indigo-500 ring-offset-2">
                        <img src="{{ asset('images/' . session('customer')->image) }}" alt="Avatar" />
                    </div>
                </label>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-4 z-50 p-3 shadow-xl bg-white dark:bg-gray-800 text-black dark:text-white rounded-xl w-56 space-y-2">
                    <li>
                        <a href="{{ route('customer.profile') }}"
                           class="hover:bg-indigo-100 dark:hover:bg-gray-700 rounded-md px-2 py-1" style="font-size: 18px">
                            Thông tin cá nhân
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('customer.logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-error btn-sm w-full mt-1">Đăng xuất</button>
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
