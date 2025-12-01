@extends('master')

@section('title', 'Trang chủ')

@section('content')
<div class="space-y-12">
    <!-- Banner Slider -->
    @include('layouts.banner')

    <!-- Promotional Strip -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Free Shipping -->
        <div class="bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl p-6 text-white flex items-center gap-4 shadow-lg hover:shadow-xl transition-all">
            <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fa-solid fa-truck"></i>
            </div>
            <div>
                <h4 class="font-bold text-lg">Giao hàng miễn phí</h4>
                <p class="text-sm text-white/80">Cho đơn hàng từ 500K</p>
            </div>
        </div>

        <!-- Authentic Products -->
        <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl p-6 text-white flex items-center gap-4 shadow-lg hover:shadow-xl transition-all">
            <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fa-solid fa-shield-check"></i>
            </div>
            <div>
                <h4 class="font-bold text-lg">Hàng chính hãng</h4>
                <p class="text-sm text-white/80">Bảo hành 24 tháng</p>
            </div>
        </div>

        <!-- Easy Returns -->
        <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-xl p-6 text-white flex items-center gap-4 shadow-lg hover:shadow-xl transition-all">
            <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fa-solid fa-rotate-left"></i>
            </div>
            <div>
                <h4 class="font-bold text-lg">Đổi trả dễ dàng</h4>
                <p class="text-sm text-white/80">Trong vòng 30 ngày</p>
            </div>
        </div>
    </div>

    <!-- Search & Filter Section -->
    <section class="space-y-6">
        <div class="space-y-3">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-search text-indigo-600 dark:text-indigo-400"></i>
                Tìm kiếm sản phẩm
            </h2>
            <form method="GET" action="{{ route('customer.home') }}" class="relative">
                <div class="relative group">
                    <input type="search" name="query"
                           class="w-full px-6 py-4 rounded-full bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 focus:border-indigo-500 dark:focus:border-indigo-400 focus:outline-none text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 transition-all shadow-md focus:shadow-lg"
                           placeholder="🔍 Tìm kiếm laptop, linh kiện, phụ kiện..."
                           value="{{ request('query') }}" />
                    <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 text-lg">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Quick Filter Tags -->
        <div class="flex flex-wrap gap-3">
            <button class="px-5 py-2 rounded-full bg-gradient-to-r from-indigo-100 to-indigo-50 dark:from-indigo-900/40 dark:to-indigo-900/20 text-indigo-700 dark:text-indigo-300 hover:from-indigo-200 hover:to-indigo-100 dark:hover:from-indigo-900/60 dark:hover:to-indigo-900/40 transition-all text-sm font-semibold border border-indigo-200 dark:border-indigo-800 cursor-pointer">
                <i class="fa-solid fa-fire mr-2"></i>Nổi bật hôm nay
            </button>
            <button class="px-5 py-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all text-sm font-semibold border border-gray-200 dark:border-gray-700 cursor-pointer">
                <i class="fa-solid fa-star mr-2"></i>Đánh giá cao nhất
            </button>
            <button class="px-5 py-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all text-sm font-semibold border border-gray-200 dark:border-gray-700 cursor-pointer">
                <i class="fa-solid fa-tag mr-2"></i>Giảm giá lớn
            </button>
            <button class="px-5 py-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all text-sm font-semibold border border-gray-200 dark:border-gray-700 cursor-pointer">
                <i class="fa-solid fa-sparkles mr-2"></i>Mới nhất
            </button>
        </div>
    </section>

    <!-- Flash Sale Banner -->
    <div class="bg-gradient-to-r from-red-600 via-red-500 to-orange-500 rounded-2xl p-8 text-white overflow-hidden relative">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-black/20 rounded-full blur-3xl -z-10"></div>

        <div class="flex items-center justify-between relative z-10">
            <div class="space-y-3 flex-1">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-fire text-2xl animate-pulse"></i>
                    <span class="text-xl font-bold">FLASH SALE</span>
                </div>
                <h3 class="text-4xl font-extrabold leading-tight">Giảm giá tới <span class="text-yellow-300">70%</span></h3>
                <p class="text-white/90 text-lg">Chỉ hôm nay - Số lượng có hạn!</p>
                <div class="flex gap-4 pt-4">
                    <div class="text-center">
                        <div class="text-3xl font-bold bg-black/30 rounded-lg px-4 py-2">23</div>
                        <p class="text-xs mt-1">Giờ</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold bg-black/30 rounded-lg px-4 py-2">45</div>
                        <p class="text-xs mt-1">Phút</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold bg-black/30 rounded-lg px-4 py-2">12</div>
                        <p class="text-xs mt-1">Giây</p>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center justify-center text-8xl opacity-20">
                <i class="fa-solid fa-bolt"></i>
            </div>
        </div>
        <a href="#products" class="inline-block mt-6 px-8 py-3 bg-white text-red-600 font-bold rounded-xl hover:scale-105 hover:shadow-2xl transition-all">
            Mua ngay <i class="fa-solid fa-arrow-right ml-2"></i>
        </a>
    </div>

    <!-- Product Categories -->
    @php
        $sections = [
            [
                'label' => 'Laptop',
                'icon' => 'fa-laptop',
                'relation' => 'laptop',
                'color' => 'from-blue-500 to-cyan-500',
                'url' => '/laptop'
            ],
            [
                'label' => 'Linh Kiện',
                'icon' => 'fa-microchip',
                'relation' => 'component',
                'color' => 'from-purple-500 to-pink-500',
                'url' => '/component'
            ],
            [
                'label' => 'Phụ Kiện',
                'icon' => 'fa-headphones-alt',
                'relation' => 'accessories',
                'color' => 'from-orange-500 to-red-500',
                'url' => '/accessories'
            ],
        ];
    @endphp

    @foreach ($sections as $section)
        <section class="space-y-6" id="products">
            <!-- Section Header with Action -->
            <div class="flex items-center justify-between gap-6">
                <div class="flex items-center gap-4 flex-1">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br {{ $section['color'] }} flex items-center justify-center text-white shadow-xl">
                        <i class="fas {{ $section['icon'] }} text-2xl"></i>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white">{{ $section['label'] }}</h2>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Khám phá bộ sưu tập {{ mb_strtolower($section['label']) }} chính hãng</p>
                    </div>
                </div>
                <a href="{{ $section['url'] }}" class="hidden md:flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r {{ $section['color'] }} text-white font-bold hover:shadow-lg transition-all hover:scale-105 whitespace-nowrap">
                    Xem tất cả <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-6">
                @forelse ($products->filter(fn($product) => $product->{$section['relation']})->take(10) as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-span-full py-16 text-center">
                        <i class="fa-solid fa-box-open text-7xl text-gray-300 dark:text-gray-600 mb-4 block"></i>
                        <p class="text-gray-600 dark:text-gray-400 text-lg font-medium">Không có sản phẩm nào</p>
                    </div>
                @endforelse
            </div>

            <!-- View All Button (Mobile) -->
            <div class="md:hidden">
                <a href="{{ $section['url'] }}" class="block w-full py-3 text-center rounded-xl bg-gradient-to-r {{ $section['color'] }} text-white font-bold hover:shadow-lg transition-all">
                    Xem tất cả {{ $section['label'] }} <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </section>
    @endforeach

    <!-- Why Choose Us Section -->
    <section class="bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 rounded-3xl p-8 md:p-12 border border-indigo-200/50 dark:border-indigo-900/50">
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white text-center mb-12">
            Tại sao chọn FlashTech?
        </h2>
        <div class="grid md:grid-cols-4 gap-8">
            <div class="text-center space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center text-white text-2xl mx-auto">
                    <i class="fa-solid fa-rocket"></i>
                </div>
                <h4 class="font-bold text-lg text-gray-900 dark:text-white">Giao hàng nhanh</h4>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Giao hàng chỉ trong 1-2 ngày cho Hà Nội và HCM</p>
            </div>
            <div class="text-center space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-green-500 to-emerald-500 flex items-center justify-center text-white text-2xl mx-auto">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <h4 class="font-bold text-lg text-gray-900 dark:text-white">Hỗ trợ 24/7</h4>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Đội ngũ chuyên viên sẵn sàng hỗ trợ bạn</p>
            </div>
            <div class="text-center space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center text-white text-2xl mx-auto">
                    <i class="fa-solid fa-credit-card"></i>
                </div>
                <h4 class="font-bold text-lg text-gray-900 dark:text-white">Thanh toán linh hoạt</h4>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Hỗ trợ nhiều phương thức thanh toán</p>
            </div>
            <div class="text-center space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-pink-500 to-rose-500 flex items-center justify-center text-white text-2xl mx-auto">
                    <i class="fa-solid fa-percent"></i>
                </div>
                <h4 class="font-bold text-lg text-gray-900 dark:text-white">Giá tốt nhất</h4>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Cam kết giá rẻ nhất thị trường</p>
            </div>
        </div>
    </section>

    <!-- Newsletter Section with Better Design -->
    <section class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 dark:from-indigo-900 dark:via-purple-900 dark:to-pink-900 rounded-3xl p-8 md:p-16 overflow-hidden relative">
        <!-- Animated background -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl -z-10 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-black/20 rounded-full blur-3xl -z-10"></div>

        <div class="max-w-2xl mx-auto text-center space-y-6 relative z-10">
            <div class="inline-block px-4 py-2 rounded-full bg-white/20 text-white font-semibold text-sm border border-white/30">
                <i class="fa-solid fa-bell mr-2"></i>Đặc biệt cho bạn
            </div>
            <h3 class="text-4xl md:text-5xl font-extrabold text-white leading-tight">
                Nhận khuyến mãi độc quyền
            </h3>
            <p class="text-white/90 text-lg md:text-xl">
                Đăng ký nhận email và được thông báo sớm về các sản phẩm mới, giảm giá flash sale, và các khuyến mãi độc quyền chỉ dành cho thành viên.
            </p>
            <form class="flex flex-col sm:flex-row gap-3 mt-8 max-w-md mx-auto">
                <input
                    type="email"
                    placeholder="Nhập email của bạn"
                    class="flex-1 px-6 py-4 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500 font-medium transition-all focus:ring-2 focus:ring-white/50"
                    required
                >
                <button
                    type="submit"
                    class="px-8 py-4 bg-white text-indigo-600 font-bold rounded-xl hover:shadow-2xl transition-all hover:scale-105 flex items-center justify-center gap-2 whitespace-nowrap"
                >
                    <i class="fa-solid fa-paper-plane"></i>
                    Đăng ký
                </button>
            </form>
            <p class="text-white/70 text-xs">
                <i class="fa-solid fa-shield-halved mr-1"></i>
                Chúng tôi không chia sẻ email của bạn cho bất kỳ ai
            </p>
        </div>
    </section>

    <!-- Featured Brands -->
    <section class="space-y-6">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white text-center">
            Các thương hiệu nổi tiếng
        </h2>
        <div class="grid grid-cols-3 md:grid-cols-6 gap-6">
            @for ($i = 1; $i <= 6; $i++)
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 hover:shadow-xl hover:border-indigo-300 dark:hover:border-indigo-700 transition-all flex items-center justify-center h-32">
                    <div class="text-center">
                        <div class="text-4xl text-gray-400 dark:text-gray-500 mb-2">
                            <i class="fa-brands fa-apple"></i>
                        </div>
                        <p class="font-bold text-gray-700 dark:text-gray-300">Brand {{ $i }}</p>
                    </div>
                </div>
            @endfor
        </div>
    </section>

</div>
@endsection
