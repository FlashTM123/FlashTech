<div>
    @if (!empty($cartItems))
        <div class="mt-3 card card-compact dropdown-content w-60 bg-white dark:bg-gray-800 text-black dark:text-white shadow-lg">
            <div class="card-body">
                <span class="font-bold text-lg">{{ count($cartItems) }} sản phẩm</span>
                <span class="text-indigo-500">
                    Tổng: {{ number_format($totalPrice) }}₫
                </span>
                <div class="card-actions">
                    <a href="{{ route('customer.cart') }}" class="btn btn-primary btn-block">Xem giỏ hàng</a>
                </div>
            </div>
        </div>
    @else
        <div class="mt-3 card card-compact dropdown-content w-60 bg-white dark:bg-gray-800 text-black dark:text-white shadow-lg">
            <div class="card-body">
                <span class="font-bold text-lg">Giỏ hàng trống</span>
            </div>
        </div>
    @endif
</div>
