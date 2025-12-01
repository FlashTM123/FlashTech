@extends('app')

@section('title', 'Customers List')

@section("content")
    <div class="container mx-auto p-6">
        <div class="flex flex-col gap-6">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-indigo-500 to-purple-600 bg-clip-text text-transparent">Danh sách khách hàng</h2>
                <span class="text-sm text-base-content/60">{{ $customers->count() }} khách hàng</span>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto rounded-2xl border border-base-300 bg-base-100 shadow-lg backdrop-blur-sm">
                <table class="table table-zebra">
                    <thead class="text-base font-semibold text-base-content/80">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Họ tên</th>
                            <th class="text-center">Ảnh</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Ngày sinh</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">Điện thoại</th>
                            <th class="text-center">Địa chỉ</th>
                            <th class="text-center">Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $index => $customer)
                            <tr class="hover:bg-base-200/50">
                                <td class="text-center font-semibold">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $customer->name }}</td>
                                <td class="text-center">
                                    <div class="avatar">
                                        <div class="w-10 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                            <img src="{{ asset('images/' . $customer->image) }}" alt="{{ $customer->name }}">
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="tooltip" data-tip="{{ $customer->email }}">
                                        <span class="truncate max-w-[150px] inline-block">{{ $customer->email }}</span>
                                    </div>
                                </td>
                             
                                <td class="text-center">{{ \Carbon\Carbon::parse($customer->date_of_birth)->format('d/m/Y') }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $customer->gender === 'Male' ? 'badge-info' : 'badge-rose-500' }}">
                                        {{ $customer->gender }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $customer->phone }}</td>
                                <td class="text-center">{{ $customer->address }}</td>
                                <td class="text-center text-xs text-gray-500">
                                    {{ \Carbon\Carbon::parse($customer->created_at)->diffForHumans() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            {{-- <div class="text-right mt-4">{{ $customers->links() }}</div> --}}
        </div>
    </div>
@endsection
