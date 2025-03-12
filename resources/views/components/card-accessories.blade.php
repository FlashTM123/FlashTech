<div class="card bg-base-100 shadow-md p-4 rounded-lg">
    <img src="{{$image}}" class="rounded-md" alt="">
    <h3 class="font-bold mt-2 text-base-content">{{$name}}</h3>
    <div class="flex flex-wrap gap-1 mt-2">

        <span class="badge badge-outline">{{$type}}</span>
    </div>
    <p>Quantity: {{$quantity}}</p>
    <div class="mt-2">
        <span class="text-gray-400 line-through">{{$price1}}đ</span>
        <span class="ml-2 bg-red-500 text-white px-2 py-1 text-xs rounded">{{$discount}}%</span>
    </div>
    <div class="text-xl font-bold text-orange-500 mt-1">{{$price2}}đ</div>
    <div class="d-flex gap-6">
        @if($quantity > 0)
            <button class="btn btn-outline btn-success">Buy Now</button>
        @else
            <button class="btn btn-outline btn-error" disabled>Out of stock</button>
        @endif
        <button class="btn btn-outline btn-secondary">Detail</button>
    </div>

</div>
