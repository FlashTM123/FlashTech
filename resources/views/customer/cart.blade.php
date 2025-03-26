@extends('master')

@section('title', 'Giỏ hàng')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-3xl font-bold mb-6 justify-center">
                <i class="fas fa-shopping-cart mr-2"></i> Giỏ hàng của bạn
            </h2>

            @if(session('cart') && count(session('cart')) > 0)
                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr class="bg-base-200">
                                <th class="text-lg">Sản phẩm</th>
                                <th class="text-lg">Đơn giá</th>
                                <th class="text-lg">Số lượng</th>
                                <th class="text-lg">Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            @foreach(session('cart') as $id => $product)
                                <tr data-id="{{ $id }}">
                                    <td>
                                        <div class="flex items-center gap-4">
                                            <div class="avatar">
                                                <div class="w-16 rounded">
                                                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold">{{ $product['name'] }}</div>
                                                <div class="text-sm opacity-50"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-lg">{{ number_format($product['price']) }}₫</td>
                                    <td>
                                        <div class="join">
                                            <button class="btn btn-sm decrease-quantity" data-id="{{ $id }}">-</button>
                                            <span class="btn btn-sm join-item no-animation quantity">{{ $product['quantity'] }}</span>
                                            <button class="btn btn-sm increase-quantity" data-id="{{ $id }}">+</button>
                                        </div>
                                    </td>
                                    <td class="text-lg font-bold total-price">{{ number_format($product['price'] * $product['quantity']) }}₫</td>
                                    <td>
                                        <a href="{{ route('customer.cartRemove', $id) }}" class="btn btn-outline btn-error">Delete</a>                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="divider"></div>

                <div class="flex flex-col lg:flex-row justify-between items-center gap-6">
                    <div class="w-full lg:w-1/2">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Mã giảm giá</span>
                            </label>
                            <div class="join w-full">
                                <input type="text" placeholder="Nhập mã giảm giá" class="input input-bordered join-item w-full" />
                                <button class="btn btn-primary join-item">Áp dụng</button>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2">
                        <div class="card bg-base-200">
                            <div class="card-body">
                                <div class="flex justify-between text-lg">
                                    <span>Tạm tính:</span>
                                    <span class="font-bold" id="subtotal">{{ number_format(array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart')))) }}₫</span>
                                </div>
                                <div class="flex justify-between text-lg">
                                    <span>Giảm giá:</span>
                                    <span class="font-bold text-success">-0₫</span>
                                </div>
                                <div class="flex justify-between text-xl mt-2">
                                    <span>Tổng cộng:</span>
                                    <span class="font-bold text-primary" id="total">{{ number_format(array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart')))) }}₫</span>
                                </div>
                                <div class="card-actions justify-end mt-4">
                                    <a href="{{ route('checkout') }}" class="btn btn-primary btn-block">
                                        Tiến hành thanh toán <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                </div>
                                <div class="text-center mt-2">
                                    <a href="{{ route('customer.home') }}" class="link link-primary">
                                        <i class="fas fa-chevron-left mr-1"></i> Tiếp tục mua sắm
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-shopping-cart text-5xl text-gray-400 mb-4"></i>
                    <h3 class="text-2xl font-bold mb-2">Giỏ hàng trống</h3>
                    <p class="mb-6">Bạn chưa có sản phẩm nào trong giỏ hàng</p>
                    <a href="{{ route('customer.home') }}" class="btn btn-primary">
                        <i class="fas fa-store mr-2"></i> Mua sắm ngay
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.increase-quantity').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const quantityElement = this.previousElementSibling;
                const quantity = parseInt(quantityElement.innerText) + 1;
                quantityElement.innerText = quantity;
                updateTotal(id, quantity);
                updateQuantity(id, quantity);
            });
        });

        document.querySelectorAll('.decrease-quantity').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const quantityElement = this.nextElementSibling;
                const quantity = parseInt(quantityElement.innerText) - 1;
                if (quantity > 0) {
                    quantityElement.innerText = quantity;
                    updateTotal(id, quantity);
                    updateQuantity(id, quantity);
                }
            });
        });

        function updateTotal(id, quantity) {
            const row = document.querySelector(`tr[data-id="${id}"]`);
            const price = parseInt(row.querySelector('.text-lg').innerText.replace(/[^0-9]/g, ''));
            const totalPriceElement = row.querySelector('.total-price');
            const totalPrice = price * quantity;
            totalPriceElement.innerText = new Intl.NumberFormat().format(totalPrice) + '₫';

            let subtotal = 0;
            document.querySelectorAll('.total-price').forEach(element => {
                subtotal += parseInt(element.innerText.replace(/[^0-9]/g, ''));
            });

            document.getElementById('subtotal').innerText = new Intl.NumberFormat().format(subtotal) + '₫';
            document.getElementById('total').innerText = new Intl.NumberFormat().format(subtotal) + '₫';
        }

        function updateQuantity(id, quantity) {
            fetch('{{ route('customer.updateQuantity') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ id: id, quantity: quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Quantity updated successfully');
                }
            });
        }
    });
</script>
@endsection
