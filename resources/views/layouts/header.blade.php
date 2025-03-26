<div class="navbar bg-base-100 shadow-sm">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
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
        <div class="flex-1">
            <a class="btn btn-ghost text-2xl font-bold tracking-wide text-primary hover:text-primary-focus transition-colors duration-300" href="{{ url('/') }}">
                <span class="font-bold text-3xl mr-3 bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text text-transparent">
                    LCAS
                </span>
            </a>
        </div>
    </div>
    <div role="tablist" class="navbar-center hidden lg:flex">
        <a role="tab" class="tab" href="{{ url('/laptop') }}">Laptop</a>
        <a role="tab" class="tab" href="{{ url('/component') }}">Linh kiện</a>
        <a role="tab" class="tab" href="{{ url('/accessories') }}">Phụ kiện</a>
    </div>
    <div class="navbar-end">
        <div class="flex-none">
            <!-- Giỏ hàng -->
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="badge badge-sm indicator-item">{{ count(session('cart', [])) }}</span>
                    </div>
                </div>
                <div class="card card-compact dropdown-content bg-base-100 z-1 mt-3 w-52 shadow">
                    <div class="card-body">
                        <span class="text-lg font-bold">{{ count(session('cart', [])) }} Items</span>
                        <span class="text-info">Subtotal: {{ number_format(array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart', [])))) }}₫</span>
                        <div class="card-actions">
                            <a href="{{ route('customer.cart') }}" class="btn btn-primary btn-block">View cart</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kiểm tra đăng nhập -->
            @if(session()->has('customer'))
                <!-- Nếu đã đăng nhập, hiển thị Avatar -->
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img alt="User Avatar" src="{{ asset('images/' . session('customer')->image) }}" />
                        </div>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                        <li>
                            <a href="">
                                {{ session('customer')->name }}
                            </a>
                        </li>
                        <li><a href="{{ route('customer.profile')}}">Profile</a></li>
                        <li>
                            <form action="{{ route('customer.logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <!-- Nếu chưa đăng nhập, hiển thị nút Login -->
                <a href="{{ route('customer.login') }}" class="btn btn-outline btn-primary">Login</a>
                <a href="{{ route('customer.register') }}" class="btn btn-outline btn-secondary">Register</a>
            @endif
        </div>
    </div>
</div>
