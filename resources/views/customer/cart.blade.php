@extends('master')

@section('title', 'Giỏ hàng')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="grid lg:grid-cols-3 gap-10">

        {{-- Giỏ hàng --}}
        <div class="lg:col-span-2 space-y-6">
            <h2 class="text-3xl font-bold text-center text-primary mb-6">
                <i class="fas fa-shopping-cart mr-2"></i> Giỏ hàng của bạn
            </h2>

            @if(session('cart') && count(session('cart')) > 0)
                @foreach(session('cart') as $id => $product)
                    <div class="rounded-xl shadow-sm hover:shadow-md transition p-4">
                        <div class="flex flex-col md:flex-row items-center gap-4">
                            <div class="w-24 h-24 rounded-lg overflow-hidden">
                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 w-full">
                                <h3 class="text-lg font-semibold">{{ $product['name'] }}</h3>
                                <p class="text-sm text-gray-500 mt-1">Đơn giá: {{ number_format($product['price']) }}₫</p>

                                <div class="mt-3 flex items-center gap-3">
                                    <button class="btn btn-sm btn-outline decrease-quantity" data-id="{{ $id }}">-</button>
                                    <span class="font-semibold quantity">{{ $product['quantity'] }}</span>
                                    <button class="btn btn-sm btn-outline increase-quantity" data-id="{{ $id }}">+</button>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-bold text-success total-price">
                                    {{ number_format($product['price'] * $product['quantity']) }}₫
                                </div>
                                <a href="{{ route('customer.cartRemove', $id) }}" class="btn btn-xs btn-error mt-2">Xóa</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="flex justify-between pt-6">
                    <a href="{{ route('customer.cartRemoveAll') }}" class="btn btn-outline btn-error">
                        <i class="fas fa-trash-alt mr-2"></i> Xóa toàn bộ
                    </a>
                    <a href="{{ route('customer.home') }}" class="btn btn-outline btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i> Tiếp tục mua sắm
                    </a>
                </div>
            @else
                <div class="text-center py-24">
                    <i class="fas fa-shopping-basket text-6xl text-gray-300 mb-6"></i>
                    <h3 class="text-2xl font-semibold mb-2">Giỏ hàng trống</h3>
                    <p class="text-gray-500 mb-6">Bạn chưa thêm sản phẩm nào vào giỏ hàng.</p>
                    <a href="{{ route('customer.home') }}" class="btn btn-primary">Bắt đầu mua sắm</a>
                </div>
            @endif
        </div>

        {{-- Thanh toán --}}
        @if(session('cart') && count(session('cart')) > 0)
        <div class="card bg-base-200 rounded-xl shadow-lg">
            <div class="card-body space-y-4">
                <h3 class="text-xl font-bold text-center">Tóm tắt đơn hàng</h3>

                {{-- Mã giảm giá --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Mã giảm giá</span>
                    </label>
                    <div class="join w-full">
                        <input type="text" class="input input-bordered join-item w-full" placeholder="Nhập mã..." />
                        <button class="btn join-item btn-accent">Áp dụng</button>
                    </div>
                </div>

                {{-- Tính toán --}}
                @php
                    $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], session('cart')));
                    $shipping = 30000;
                    $discount = 0;
                @endphp

                <div class="divider"></div>

                <div class="text-sm space-y-2">
                    <div class="flex justify-between">
                        <span>Tạm tính</span>
                        <span id="subtotal">{{ number_format($subtotal) }}₫</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Giảm giá</span>
                        <span class="text-success">-{{ number_format($discount) }}₫</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Phí giao hàng</span>
                        <span>{{ number_format($shipping) }}₫</span>
                    </div>
                    <div class="border-t pt-2 flex justify-between text-lg font-bold">
                        <span>Tổng cộng</span>
                        <span id="total" class="text-primary">{{ number_format($subtotal + $shipping - $discount) }}₫</span>
                    </div>
                </div>

                <a href="{{ route('checkout') }}" class="btn btn-primary w-full">
                    Tiến hành thanh toán <i class="fas fa-credit-card ml-2"></i>
                </a>
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
            const row = document.querySelector(`.increase-quantity[data-id="${id}"]`).closest('.rounded-xl'); // Tìm hàng hiện tại
            const priceText = row.querySelector('.text-gray-500').textContent; // Lấy giá sản phẩm
            const price = parseInt(priceText.replace(/[^\d]/g, '')); // Loại bỏ ký tự không phải số
            const totalPrice = price * quantity; // Tính tổng giá

            // Cập nhật tổng giá cho sản phẩm
            row.querySelector('.total-price').textContent = new Intl.NumberFormat().format(totalPrice) + '₫';

            // Cập nhật tổng giá trị giỏ hàng
            let subtotal = 0;
            document.querySelectorAll('.total-price').forEach(el => {
                subtotal += parseInt(el.textContent.replace(/[^\d]/g, ''));
            });

            const shipping = 30000; // Phí giao hàng cố định
            document.getElementById('subtotal').textContent = new Intl.NumberFormat().format(subtotal) + '₫';
            document.getElementById('total').textContent = new Intl.NumberFormat().format(subtotal + shipping) + '₫';
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
                if (data.success) console.log('Cập nhật số lượng thành công');
            });
        }
    });
</script>
@endsection
