@extends('app')

@section('title', 'Laptop')

@section('content')
   <div class="container mx-auto p-6">
       <div class="flex flex-col h-full">
           <div class="grow">
               <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                   <h2 class="text-2xl font-semibold text-white-800 dark:text-dark-200">Laptop List</h2>
                   <form method="GET" action="{{ route('laptop.index') }}" class="mb-4">
                       <label class="input">
                           <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></g></svg>
                           <input type="text"
                                  name="search"
                                  value="{{ request('search') }}"
                                  placeholder="Search brand..."
                                  class="input input-bordered w-full max-w-xs" />
                           <kbd class="kbd kbd-sm">⌘</kbd>
                           <kbd class="kbd kbd-sm">K</kbd>
                       </label>
                   </form>
                   <a href="{{ route('laptop.create') }}" class="btn btn-outline">
                       ➕ Add Laptop
                   </a>

               </div>
               <div class="my-3">
                   <div>
                       <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                           <table class="table table-auto w-full" >
                               <thead class="text-white-800 dark:text-dark-700">
                               <tr>
                                   <th class="text-center">#</th>
                                   <th class="text-center">Name</th>
                                   <th class="text-center">Brand</th>
                                   <th class="text-center">Color</th>
                                   <th class="text-center">CPU</th>
                                   <th class="text-center">RAM</th>
                                   <th class="text-center">VGA</th>
                                   <th class="text-center">Storage</th>
                                   <th class="text-center">Original price</th>
                                   <th class="text-center">Discount</th>
                                   <th class="text-center">Promotional price</th>
                                   <th class="text-center">Quantity</th>
                                   <th class="text-center">Status</th>
                                   <th class="text-center">Image</th>
                                   <th class="text-center">Action</th>
                               </tr>

                               </thead>
                               <tbody>
                               @foreach ($laptops as $index => $laptop)
                                   <tr class="hover:bg-base-200/50">
                                       <th class="text-center">{{ ($laptops->currentPage() - 1) * $laptops->perPage() + $loop->iteration }}</th>
                                       <td class="text-center">{{ $laptop->name }}</td>
                                       <td class="text-center">{{ $laptop->brand ? $laptop->brand->name : 'N/A' }}</td>
                                       <td class="text-center">{{ $laptop->color ? $laptop->color->name : 'N/A' }}</td>
                                       <td class="text-center">{{ $laptop->cpu }}</td>
                                       <td class="text-center">{{ $laptop->ram }}</td>
                                       <td class="text-center">{{ $laptop->vga }}</td>
                                       <td class="text-center">{{ $laptop->storage }}</td>
                                       {{--                        Giá gốc--}}
                                       <td class="text-center">{{ number_format($laptop->original_price)}}Đ</td>
                                       <td class="text-center">-{{ $laptop->discount }}%</td>
                                       {{--                        Giá được giảm--}}
                                       <td class="text-center">{{ number_format($laptop->promotional_price)}}Đ</td>
                                       <td class="text-center">{{ $laptop->quantity }}</td>
                                       <td class="text-center">
                                                @if($laptop->quantity > 0)
                                                    <span class="text-green-400">In Stock</span>
                                           @else
                                               <span class="text-red-400">Out of stock</span>
                                                @endif
                                       </td>
                                       <td class="text-center">
                                           <img src="{{ $laptop->image }}" alt="Laptop Image" class="w-12 h-12 object-cover rounded-lg">
                                       </td>
                                       <td class="text-center">
                                           <div class="flex space-x-2">
                                               <a href="{{ route('laptop.edit', $laptop->id) }}" class="btn btn-outline btn-warning">
                                                    Edit
                                               </a>
                                               <form action="{{ route('laptop.destroy', $laptop->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this laptop?');">
                                                   @csrf
                                                   @method('DELETE')
                                                   <button type="submit" class="btn btn-outline btn-error">
                                                        Delete
                                                   </button>
                                               </form>
                                           </div>
                                       </td>
                                   </tr>
                               @endforeach

                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
