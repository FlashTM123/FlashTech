@extends('master')

@section('title', 'Giỏ hàng')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <!-- Premium Page Header -->
    <div class="mb-12">
        <div class="inline-block mb-4">
            <span class="px-4 py-2 rounded-full bg-gradient-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/40 dark:to-purple-900/40 text-indigo-700 dark:text-indigo-300 text-sm font-semibold">
                <i class="fa-solid fa-shopping-bag mr-2"></i>Quản lý đơn hàng
            </span>
        </div>
        <div class="space-y-2">
            <div class="flex items-center gap-3">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center text-white shadow-lg">
                    <i class="fa-solid fa-shopping-cart text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-5xl font-extrabold bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">Giỏ hàng của bạn</h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Kiểm tra, chỉnh sửa và thanh toán đơn hàng</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Cart Items -->
        <div class="lg:col-span-2">
            @if(session('cart') && count(session('cart')) > 0)
                <div class="space-y-4">
                    @foreach(session('cart') as $id => $product)
                        <div class="group bg-white dark:bg-gray-800/80 rounded-2xl border border-gray-200 dark:border-gray-700/50 overflow-hidden hover:shadow-2xl transition-all duration-300 hover:border-indigo-300 dark:hover:border-indigo-600/50">
                            <div class="p-4 md:p-6 flex flex-col md:flex-row gap-6 items-start md:items-center">
                                <!-- Product Image with Badge -->
                                <div class="relative w-full md:w-32 h-32 rounded-xl overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 flex-shrink-0 group-hover:shadow-lg transition-all">
                                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>

                                <!-- Product Info -->
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg md:text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                        {{ $product['name'] }}
                                    </h3>

                                    <div class="space-y-3">
                                        <!-- Price -->
                                        <div class="flex items-center gap-2">
                                            <i class="fa-solid fa-tag text-indigo-600 dark:text-indigo-400"></i>
                                            <span class="text-sm text-gray-600 dark:text-gray-400">Đơn giá:</span>
                                            <span class="font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">{{ number_format($product['price']) }}đ</span>
                                        </div>

                                        <!-- Quantity Selector - Enhanced -->
                                        <div class="flex items-center gap-3">
                                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Số lượng:</span>
                                            <div class="flex items-center bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 border-2 border-gray-200 dark:border-gray-600 rounded-lg overflow-hidden hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors">
                                                <button class="decrease-quantity px-3 py-2 hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400" data-id="{{ $id }}">
                                                    <i class="fa-solid fa-minus text-sm font-bold"></i>
                                                </button>
                                                <span class="px-5 py-2 font-bold text-gray-900 dark:text-white quantity min-w-16 text-center">{{ $product['quantity'] }}</span>
                                                <button class="increase-quantity px-3 py-2 hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400" data-id="{{ $id }}">
                                                    <i class="fa-solid fa-plus text-sm font-bold"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price & Actions -->
                                <div class="w-full md:w-auto md:text-right space-y-4">
                                    <!-- Total Price Box -->
                                    <div class="bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 dark:from-indigo-900/40 dark:via-purple-900/40 dark:to-pink-900/40 rounded-xl p-5 border border-indigo-200 dark:border-indigo-800/50 backdrop-blur-sm">
                                        <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2 uppercase tracking-wide">Thành tiền</p>
                                        <p class="text-3xl font-extrabold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent total-price">
                                            {{ number_format($product['price'] * $product['quantity']) }}đ
                                        </p>
                                    </div>

                                    <!-- Delete Button -->
                                    <a href="{{ route('customer.cartRemove', $id) }}" class="block w-full md:w-auto px-4 py-2 bg-gradient-to-r from-red-100 to-orange-100 dark:from-red-900/40 dark:to-orange-900/40 text-red-600 dark:text-red-400 hover:from-red-200 hover:to-orange-200 dark:hover:from-red-900/60 dark:hover:to-orange-900/60 rounded-lg font-semibold transition-all duration-300 text-center text-sm border border-red-200 dark:border-red-800/50 hover:shadow-lg hover:scale-105">
                                        <i class="fa-solid fa-trash-can mr-1"></i>Xóa khỏi giỏ
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Action Buttons -->
                <div class="mt-10 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('customer.cartRemoveAll') }}" class="flex-1 px-6 py-4 rounded-xl border-2 border-red-500 dark:border-red-600 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 font-bold transition-all duration-300 flex items-center justify-center gap-2 hover:shadow-lg hover:scale-105 group">
                        <i class="fa-solid fa-trash group-hover:rotate-12 transition-transform"></i>
                        Xóa tất cả sản phẩm
                    </a>
                    <a href="{{ route('customer.home') }}" class="flex-1 px-6 py-4 rounded-xl border-2 border-indigo-500 dark:border-indigo-600 text-indigo-600 dark:text-indigo-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 font-bold transition-all duration-300 flex items-center justify-center gap-2 hover:shadow-lg hover:scale-105 group">
                        <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                        Tiếp tục mua sắm
                    </a>
                </div>
            @else
                <!-- Empty Cart - Premium Design -->
                <div class="text-center py-32 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800/50 dark:to-gray-900/50 rounded-2xl border-2 border-dashed border-gray-300 dark:border-gray-700">
                    <div class="inline-block p-8 rounded-3xl bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 mb-6 animate-bounce">
                        <i class="fa-solid fa-bag-shopping text-7xl text-indigo-600 dark:text-indigo-400"></i>
                    </div>
                    <h3 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-3">Giỏ hàng trống</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-10 text-lg">Bạn chưa thêm sản phẩm nào vào giỏ hàng. Hãy bắt đầu khám phá!</p>
                    <a href="{{ route('customer.home') }}" class="inline-block px-10 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold rounded-xl transition-all duration-300 hover:shadow-2xl hover:scale-105">
                        <i class="fa-solid fa-arrow-right mr-2"></i>Khám phá sản phẩm
                    </a>
                </div>
            @endif
        </div>

        <!-- Order Summary - Premium Sidebar -->
        @if(session('cart') && count(session('cart')) > 0)
        <div class="lg:col-span-1">
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700 p-8 shadow-2xl sticky top-32 space-y-6">
                <!-- Premium Header -->
                <div class="flex items-center gap-3 pb-6 border-b-2 border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center text-white">
                        <i class="fa-solid fa-receipt text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">Tóm tắt đơn</h3>
                </div>

                <!-- Discount Code Section -->
                <div class="space-y-3 p-4 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/20 dark:to-orange-900/20 rounded-xl border border-amber-200 dark:border-amber-800/50">
                    <label class="block text-sm font-bold text-gray-900 dark:text-white">
                        <i class="fa-solid fa-ticket mr-2 text-amber-600 dark:text-amber-400"></i>Mã giảm giá
                    </label>
                    <div class="flex gap-2">
                        <input type="text" placeholder="Nhập mã khuyến mãi..." class="flex-1 px-4 py-3 rounded-lg border-2 border-amber-300 dark:border-amber-700 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 text-sm font-medium placeholder-gray-500 dark:placeholder-gray-400 transition-all">
                        <button class="px-4 py-3 rounded-lg bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-bold transition-all duration-300 hover:shadow-lg hover:scale-105 text-sm whitespace-nowrap">
                            <i class="fa-solid fa-check mr-1"></i>Áp dụng
                        </button>
                    </div>
                </div>

                <div class="border-t-2 border-gray-200 dark:border-gray-700"></div>

                <!-- Price Breakdown - Enhanced -->
                @php
                    $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], session('cart')));
                    $shipping = 30000;
                    $discount = 0;
                    $total = $subtotal + $shipping - $discount;
                @endphp

                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700 dark:text-gray-300 font-semibold flex items-center gap-2">
                            <i class="fa-solid fa-calculator text-indigo-600 dark:text-indigo-400 text-sm"></i>
                            Tạm tính
                        </span>
                        <span class="font-bold text-gray-900 dark:text-white text-lg" id="subtotal">{{ number_format($subtotal) }}đ</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700 dark:text-gray-300 font-semibold flex items-center gap-2">
                            <i class="fa-solid fa-percent text-green-600 dark:text-green-400 text-sm"></i>
                            Giảm giá
                        </span>
                        <span class="font-bold text-green-600 dark:text-green-400 text-lg">-{{ number_format($discount) }}đ</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700 dark:text-gray-300 font-semibold flex items-center gap-2">
                            <i class="fa-solid fa-truck text-blue-600 dark:text-blue-400 text-sm"></i>
                            Vận chuyển
                        </span>
                        <span class="font-bold text-gray-900 dark:text-white text-lg">{{ number_format($shipping) }}đ</span>
                    </div>
                </div>

                <div class="border-t-2 border-gray-200 dark:border-gray-700"></div>

                <!-- Total - Premium -->
                <div class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 rounded-xl p-6 text-white shadow-xl">
                    <p class="text-sm font-semibold text-white/80 mb-2 uppercase tracking-wide">Tổng thanh toán</p>
                    <p class="text-4xl font-extrabold" id="total">{{ number_format($total) }}đ</p>
                </div>

                <!-- Checkout Button - Premium -->
                <a href="{{ route('checkout') }}" class="block w-full px-6 py-4 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:from-indigo-700 hover:via-purple-700 hover:to-pink-700 text-white font-bold rounded-xl transition-all duration-300 hover:shadow-2xl text-center text-lg group hover:scale-105 border-2 border-indigo-400 dark:border-indigo-600">
                    <i class="fa-solid fa-credit-card mr-2 group-hover:scale-110 transition-transform"></i>Thanh toán ngay
                </a>

                <!-- Trust Badges -->
                <div class="space-y-2 text-center text-sm">
                    <p class="text-gray-600 dark:text-gray-400 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-shield-halved text-green-600 dark:text-green-400"></i>
                        Thanh toán 100% an toàn
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-lock text-green-600 dark:text-green-400"></i>
                        Bảo mật SSL - Mã hóa dữ liệu
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-check-circle text-green-600 dark:text-green-400"></i>
                        Chính sách hoàn tiền 30 ngày
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.increase-quantity').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const quantityElement = this.previousElementSibling;
                const quantity = parseInt(quantityElement.textContent) + 1;
                quantityElement.textContent = quantity;
                updateTotal(id, quantity);
                updateQuantity(id, quantity);
            });
        });

        document.querySelectorAll('.decrease-quantity').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const quantityElement = this.nextElementSibling;
                const quantity = parseInt(quantityElement.textContent) - 1;
                if (quantity > 0) {
                    quantityElement.textContent = quantity;
                    updateTotal(id, quantity);
                    updateQuantity(id, quantity);
                }
            });
        });

        function updateTotal(id, quantity) {
            const row = document.querySelector(`.increase-quantity[data-id="${id}"]`).closest('.rounded-2xl');
            const priceText = row.querySelector('.fa-tag').parentElement.textContent;
            const price = parseInt(priceText.replace(/[^\d]/g, ''));
            const totalPrice = price * quantity;

            row.querySelector('.total-price').textContent = new Intl.NumberFormat().format(totalPrice) + 'đ';

            let subtotal = 0;
            document.querySelectorAll('.total-price').forEach(el => {
                subtotal += parseInt(el.textContent.replace(/[^\d]/g, ''));
            });

            const shipping = 30000;
            document.getElementById('subtotal').textContent = new Intl.NumberFormat().format(subtotal) + 'đ';
            document.getElementById('total').textContent = new Intl.NumberFormat().format(subtotal + shipping) + 'đ';
        }

        function updateQuantity(id, quantity) {
            fetch('{{ route('customer.updateQuantity') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ id, quantity })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) console.log('✓ Cập nhật số lượng thành công');
            });
        }
    });
</script>
@endsection
