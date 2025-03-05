@extends('app')

@section('title', 'Profile')

@section('content')

        <div class="container mt-5 ">
            <h2 class="fw-bold">Information</h2>
            <div class="row mt-4">
                <!-- Ảnh đại diện -->


                <!-- Thông tin cá nhân -->
                <div class="col-md-8">

                    <table class="table table-bordered mt-3">
                        <tr>
                            <th>Họ và tên</th>
                            <td><strong class="text-primary">{{ $admin->name }}</strong></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $admin->email }}</td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td>{{ $admin->phone ?? 'Chưa cập nhật' }}</td>
                        </tr>
                    </table>

                </div>
            </div>


        </div>

@endsection
