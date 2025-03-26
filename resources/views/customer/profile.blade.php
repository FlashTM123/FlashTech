@extends('master')

@section('title', 'Profile')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <div class="card bg-gray-800 shadow-lg col-span-1">
        <div class="card-body items-center text-center">
            <div class="avatar mb-4">
                <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                    <img src="{{ asset('images/' . $customer->image) }}" alt="Customer Avatar">
                </div>
            </div>
            <h2 class="card-title text-2xl text-gray-100">{{$customer->name}}</h2>
            <div class="divider my-2"></div>
            <div class="space-y-2 text-left w-full">
                <p><i class="fas fa-envelope mr-2 text-blue-400"></i> {{$customer->email}}</p>
                <p><i class="fas fa-phone mr-2 text-green-400"></i> {{$customer->phone}}</p>
                <p><i class="fas fa-map-marker-alt mr-2 text-red-400"></i> {{$customer->address}}</p>
            </div>
            <div class="card-actions justify-end mt-4">
                <button class="btn btn-sm btn-outline btn-primary">
                    <i class="fas fa-edit mr-1"></i> Chỉnh sửa
                </button>
            </div>
        </div>
    </div>
   <!-- Customer Details -->
   <div class="card bg-gray-800 shadow-lg col-span-1 lg:col-span-2">
    <div class="card-body">
        <h2 class="card-title text-xl mb-4 text-gray-100">Chi tiết khách hàng</h2>

        <div class="overflow-x-auto">
            <table class="table">
                <tbody>
                    <tr>
                        <th class="bg-gray-700 text-gray-100">ID</th>
                        <td class="text-gray-100">{{$customer->id}}</td>
                    </tr>
                    <tr>
                        <th class="bg-gray-700 text-gray-100">Ngày sinh</th>
                        <td class="text-gray-100">{{\Carbon\Carbon::parse($customer->date_of_birth)->format('d/m/Y')}}</td>
                    </tr>
                    <tr>
                        <th class="bg-gray-700 text-gray-100">Giới tính</th>
                        <td class="text-gray-100">{{$customer->gender}}</td>
                    </tr>
                    <tr>
                        <th class="bg-gray-700 text-gray-100">Email</th>
                        <td class="text-gray-100">{{$customer->email}}</td>
                    </tr>
                    <tr>
                        <th class="bg-gray-700 text-gray-100">Ngày đăng ký</th>
                        <td class="text-gray-100">{{\Carbon\Carbon::parse($customer->created_id)->format('d/m/Y')}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


@endsection
