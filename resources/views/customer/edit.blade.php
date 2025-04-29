@extends('master')

@section('title', 'Cập nhật hồ sơ khách hàng')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Bên trái: Profile Summary -->
        <div class="card shadow-xl bg-gradient-to-br from-primary to-blue-500 text-white p-6">
            <div class="flex flex-col items-center text-center">
                <div class="avatar mb-4">
                    <div class="w-32 rounded-full ring ring-white ring-offset-base-100 ring-offset-2">

                            <img src="{{ asset('images/' . $customer->profile_image) }}" />
                     
                    </div>
                </div>
                <h2 class="text-2xl font-bold">{{ $customer->name }}</h2>
                <p class="text-sm">{{ $customer->email }}</p>
                <p class="text-sm">{{ $customer->phone }}</p>
                <div class="mt-4">
                    <label class="cursor-pointer">
                        <span class="btn btn-sm btn-outline text-white">Chọn ảnh mới</span>
                        <input type="file" name="profile_image" class="hidden" form="updateForm">
                    </label>
                </div>
            </div>
        </div>

        <!-- Bên phải: Form cập nhật -->
        <div class="md:col-span-2">
            <div class="card bg-base-100 shadow-xl p-8">
                <h2 class="text-2xl font-semibold mb-6">
                    <i class="fas fa-edit mr-2 text-primary"></i> Cập nhật thông tin cá nhân
                </h2>

                <!-- Flash -->
                @if (session('success'))
                    <div class="alert alert-success mb-4 shadow">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                <form id="updateForm" method="POST" action="{{ route('customer.update') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="label font-medium">Họ và tên*</label>
                            <input type="text" name="name" value="{{ old('name', $customer->name) }}"
                                   class="input input-bordered w-full" required>
                        </div>

                        <div>
                            <label class="label font-medium">Email*</label>
                            <input type="email" name="email" value="{{ old('email', $customer->email) }}"
                                   class="input input-bordered w-full" required>
                        </div>

                        <div>
                            <label class="label font-medium">Mật khẩu mới</label>
                            <input type="password" name="password" class="input input-bordered w-full"
                                   placeholder="Để trống nếu không đổi">
                        </div>

                        <div>
                            <label class="label font-medium">Ngày sinh*</label>
                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $customer->date_of_birth) }}"
                                   class="input input-bordered w-full" required>
                        </div>

                        <div>
                            <label class="label font-medium">Giới tính*</label>
                            <select name="gender" class="select select-bordered w-full" required>
                                <option value="male" {{ old('gender', $customer->gender) == 'male' ? 'selected' : '' }}>Nam</option>
                                <option value="female" {{ old('gender', $customer->gender) == 'female' ? 'selected' : '' }}>Nữ</option>
                                <option value="other" {{ old('gender', $customer->gender) == 'other' ? 'selected' : '' }}>Khác</option>
                            </select>
                        </div>

                        <div>
                            <label class="label font-medium">Số điện thoại*</label>
                            <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}"
                                   class="input input-bordered w-full" required>
                        </div>
                    </div>

                    <div>
                        <label class="label font-medium">Địa chỉ*</label>
                        <input type="text" name="address" value="{{ old('address', $customer->address) }}"
                               class="input input-bordered w-full" required>
                    </div>

                    <div class="text-right mt-6">
                        <button class="btn btn-primary gap-2">
                            <i class="fas fa-save"></i> Lưu thay đổi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
