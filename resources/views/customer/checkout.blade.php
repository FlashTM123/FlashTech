@extends('master')

@section('title', 'Thanh toán')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-base-100 to-base-200 py-10">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Bước thanh toán --}}
            <div class="lg:col-span-2 space-y-6">
                <h1 class="text-4xl font-bold text-primary">Hoàn tất đơn hàng</h1>

                <form action="{{ route('customer.processCheckout') }}" method="POST" class=" rounded-2xl shadow-xl p-6 space-y-6">
                    @csrf
                    <div>
                        <h2 class="text-xl font-semibold mb-2">1. Địa chỉ giao hàng</h2>
                        <input
                            type="text"
                            name="address"
                            class="input input-bordered w-full"
                            placeholder="Số nhà, tên đường, phường/xã..."
                            value="{{ old('address', $address) }}"
                            required>
                    </div>

                    <div>
                        <h2 class="text-xl font-semibold mb-2">2. Phương thức thanh toán</h2>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 bg-base-200 p-3 rounded-xl cursor-pointer hover:bg-base-300 transition">
                                <input type="radio" name="payment_method" value="cod" checked class="radio radio-primary" />
                                <span>Thanh toán khi nhận hàng (COD)</span>
                            </label>
                            <label class="flex items-center gap-3 bg-base-200 p-3 rounded-xl cursor-pointer hover:bg-base-300 transition">
                                <input type="radio" name="payment_method" value="bank_transfer" class="radio radio-primary"  disabled/>
                                <span>Chuyển khoản ngân hàng (Đang phát triển)</span>
                            </label>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-wide text-lg">
                            <i class="fas fa-check mr-2"></i> Xác nhận đặt hàng
                        </button>
                    </div>
                </form>
            </div>

            {{-- Chi tiết đơn hàng --}}
            <div>
                <div class= "rounded-2xl shadow-xl p-6">
                    <h2 class="text-2xl font-bold mb-4 text-primary">🛒 Đơn hàng của bạn</h2>
                    <div class="space-y-4">
                        @foreach($cart as $product)
                            <div class="flex justify-between items-center border-b pb-2">
                                <div>
                                    <p class="font-medium">{{ $product['name'] }}</p>
                                    <p class="text-sm text-gray-500">x{{ $product['quantity'] }}</p>
                                </div>
                                <div class="text-right font-semibold text-success">
                                    {{ number_format($product['price'] * $product['quantity']) }}₫
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="divider"></div>

                    <div class="text-sm">
                        <div class="flex justify-between py-1">
                            <span>Tạm tính:</span>
                            <span>{{ number_format($subtotal) }}₫</span>
                        </div>
                        <div class="flex justify-between py-1">
                            <span>Phí vận chuyển:</span>
                            <span>{{ number_format(30000) }}₫</span>
                        </div>
                        <div class="flex justify-between py-2 text-lg font-bold border-t mt-2 pt-2">
                            <span>Tổng thanh toán:</span>
                            <span class="text-primary">{{ number_format($subtotal + 30000) }}₫</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
