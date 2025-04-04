@extends('master')

@section('title', 'Chỉnh sửa hồ sơ')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('customer.profile') }}" class="btn btn-circle btn-ghost">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h1 class="text-3xl font-bold">
            <i class="fas fa-user-edit text-primary mr-2"></i>
            Chỉnh sửa hồ sơ
        </h1>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success shadow-lg mb-8">
            <div>
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Profile Form -->
    <div class="card bg-base-100 shadow-lg">
        <div class="card-body">
            <form action="{{ route('customer.update')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Avatar Upload -->
                <div class="form-control mb-6">
                    <label class="label">
                        <span class="label-text">Ảnh đại diện</span>
                    </label>
                    <div class="flex items-center gap-6">
                        <div class="avatar">
                            <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                @if ($customer->profile_image)
                                    <img src="{{ asset('storage/' . $customer->profile_image) }}" alt="Ảnh đại diện">
                                @else
                                    <div class="bg-neutral text-neutral-content w-full h-full flex items-center justify-center">
                                        <i class="fas fa-user text-3xl"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <input type="file" name="profile_image" class="file-input file-input-bordered file-input-primary w-full max-w-xs">
                    </div>
                </div>

                <!-- Personal Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Họ và tên*</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name', $customer->name) }}"
                               class="input input-bordered" required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email*</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email', $customer->email) }}"
                               class="input input-bordered" required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Mật khẩu mới</span>
                            <span class="label-text-alt">(Để trống nếu không đổi)</span>
                        </label>
                        <input type="password" name="password"
                               class="input input-bordered" placeholder="Ít nhất 8 ký tự">
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Ngày sinh*</span>
                        </label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $customer->date_of_birth) }}"
                               class="input input-bordered" required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Giới tính*</span>
                        </label>
                        <select name="gender" class="select select-bordered" required>
                            <option value="male" {{ old('gender', $customer->gender) == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ old('gender', $customer->gender) == 'female' ? 'selected' : '' }}>Nữ</option>
                            <option value="other" {{ old('gender', $customer->gender) == 'other' ? 'selected' : '' }}>Khác</option>
                        </select>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Số điện thoại*</span>
                        </label>
                        <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}"
                               class="input input-bordered" required>
                    </div>
                </div>

                <!-- Address -->
                <div class="form-control mt-6">
                    <label class="label">
                        <span class="label-text">Địa chỉ*</span>
                    </label>
                    <input type="text" name="address" value="{{ old('address', $customer->address) }}"
                           class="input input-bordered" required>
                </div>

                <!-- Submit Button -->
                <div class="form-control mt-8">
                    <button type="submit" class="btn btn-primary gap-2">
                        <i class="fas fa-save"></i>
                        Cập nhật hồ sơ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
