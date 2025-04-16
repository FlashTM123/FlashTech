<div class="navbar bg-base-100 shadow fixed z-50">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a>Item 1</a></li>
                <li>
                    <a>Parent</a>
                    <ul class="p-2">
                        <li><a>Submenu 1</a></li>
                        <li><a>Submenu 2</a></li>
                    </ul>
                </li>
                <li><a>Item 3</a></li>
            </ul>
        </div>
        <a href="{{ url('/') }}" class="flex items-center gap-2 text-3xl font-bold tracking-wide">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 animate-spin-slow text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.75 3a1 1 0 011 1v.43a8.008 8.008 0 013.5 0V4a1 1 0 112 0v.43a8.008 8.008 0 013.5 0V4a1 1 0 011 1v2a1 1 0 01-1 1h-.43a8.008 8.008 0 010 3.5H20a1 1 0 110 2h-.43a8.008 8.008 0 010 3.5H20a1 1 0 01-1 1v2a1 1 0 01-1 1h-2a1 1 0 01-1-1v-.43a8.008 8.008 0 01-3.5 0V20a1 1 0 01-2 0v-.43a8.008 8.008 0 01-3.5 0V20a1 1 0 01-1-1v-2a1 1 0 011-1h.43a8.008 8.008 0 010-3.5H4a1 1 0 110-2h.43a8.008 8.008 0 010-3.5H4a1 1 0 01-1-1V5a1 1 0 011-1h2a1 1 0 011 1v.43a8.008 8.008 0 013.5 0V4a1 1 0 011-1z" />
            </svg>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-fuchsia-500">FlashGear</span>
        </a>




    </div>

    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ url('/laptop') }}">Laptop</a></li>
            <li><a href="{{ url('/component') }}">Linh kiện</a></li>
            <li><a href="{{ url('/accessories') }}">Phụ kiện</a></li>
        </ul>
    </div>

    <div class="navbar-end gap-2">
        {{-- Cart --}}
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 2.3c-.6.6-.2 1.7.7 1.7H17a2 2 0 100 4 2 2 0 000-4zM9 19a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="badge badge-sm indicator-item">
                        @if(session()->has('customer'))
                            {{ count(session('cart', [])) }}
                        @else
                            0
                        @endif
                    </span>
                </div>
            </label>
            @if(session()->has('customer'))
                <div class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                    <div class="card-body">
                        <span class="font-bold text-lg">{{ count(session('cart', [])) }} sản phẩm</span>
                        <span class="text-info">
                            Tổng:
                            {{ number_format(array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], session('cart', [])))) }}₫
                        </span>
                        <div class="card-actions">
                            <a href="{{ route('customer.cart') }}" class="btn btn-primary btn-block">Xem giỏ hàng</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Login / Avatar --}}
        @if(session()->has('customer'))
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                        <img src="{{ asset('images/' . session('customer')->image) }}" alt="Avatar" />
                    </div>
                </label>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="{{ route('customer.profile') }}">{{ session('customer')->name }}</a></li>
                    <li>
                        <form action="{{ route('customer.logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline btn-primary w-full mt-1">Đăng xuất</button>
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
