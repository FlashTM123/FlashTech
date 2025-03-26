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
                <span class="btn btn-sm join-item no-animation">{{ $product['quantity'] }}</span>
                <button class="btn btn-sm increase-quantity" data-id="{{ $id }}">+</button>
            </div>
        </td>
        <td class="text-lg font-bold total-price">{{ number_format($product['price'] * $product['quantity']) }}₫</td>
        <td>
            <button class="btn btn-ghost btn-circle text-error remove-item" data-id="{{ $id }}">
                <i class="fas fa-trash-alt"></i>
            </button>
        </td>
    </tr>
@endforeach
