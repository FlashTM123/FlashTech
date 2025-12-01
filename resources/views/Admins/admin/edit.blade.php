@extends('app')

@section('title', 'Sửa thông tin: ' . $admin->name)

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-base-content">🛠️ Cập Nhật Thông Tin Người Dùng</h1>
            <p class="text-sm text-gray-500 mt-1">Sửa đổi thông tin cho: <span class="font-semibold text-base-content">{{ $admin->name }}</span></p>
        </div>
        <a href="{{ route('admin.index') }}" class="btn btn-outline btn-sm rounded-lg">
            <i class="fa-solid fa-arrow-left"></i> Quay lại
        </a>
    </div>

    <!-- Form Container -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form -->
        <div class="lg:col-span-2 bg-base-100 rounded-xl shadow-lg p-8 border border-base-300">
            @if ($errors->any())
                <div class="alert alert-error mb-6 rounded-lg">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <div>
                        <h3 class="font-bold">⚠️ Có lỗi xảy ra:</h3>
                        <ul class="list-disc ml-5 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.update', $admin->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Thông tin cơ bản -->
                <div class="space-y-4">
                    <h3 class="text-lg font-bold text-base-content flex items-center gap-2">
                        <i class="fa-solid fa-user-circle text-indigo-600"></i> Thông tin cơ bản
                    </h3>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <!-- Name -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Họ và tên <span class="text-error">*</span></span>
                            </label>
                            <input type="text" name="name" value="{{ $admin->name }}" class="input input-bordered rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') input-error @enderror" placeholder="Nguyễn Văn A" required>
                            @error('name') <span class="text-error text-sm mt-1"><i class="fa-solid fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Email <span class="text-error">*</span></span>
                            </label>
                            <input type="email" name="email" value="{{ $admin->email }}" class="input input-bordered rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('email') input-error @enderror" placeholder="admin@example.com" required>
                            @error('email') <span class="text-error text-sm mt-1"><i class="fa-solid fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                        </div>

                        <!-- Phone -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Số điện thoại <span class="text-error">*</span></span>
                            </label>
                            <input type="text" name="phone" value="{{ $admin->phone }}" class="input input-bordered rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('phone') input-error @enderror" placeholder="0901234567" required>
                            @error('phone') <span class="text-error text-sm mt-1"><i class="fa-solid fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Mật khẩu</span>
                                <span class="label-text text-xs text-gray-500">(để trống nếu không đổi)</span>
                            </label>
                            <input type="password" name="password" class="input input-bordered rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('password') input-error @enderror" placeholder="••••••••">
                            @error('password') <span class="text-error text-sm mt-1"><i class="fa-solid fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- Vai trò & Trạng thái -->
                <div class="space-y-4">
                    <h3 class="text-lg font-bold text-base-content flex items-center gap-2">
                        <i class="fa-solid fa-shield text-indigo-600"></i> Vai trò & Trạng thái
                    </h3>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <!-- Role -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Vai trò <span class="text-error">*</span></span>
                            </label>
                            <select name="role" class="select select-bordered rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('role') select-error @enderror" required>
                                <option value="admin" @if($admin->role === 'admin') selected @endif>👑 Admin - Toàn quyền hệ thống</option>
                                <option value="moderator" @if($admin->role === 'moderator') selected @endif>🛡️ Moderator - Quản lý nội dung</option>
                                <option value="employee" @if($admin->role === 'employee') selected @endif>💬 Employee - Nhân viên hỗ trợ khách hàng</option>
                            </select>
                            @error('role') <span class="text-error text-sm mt-1"><i class="fa-solid fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                        </div>

                        <!-- Status -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Trạng thái <span class="text-error">*</span></span>
                            </label>
                            <select name="status" class="select select-bordered rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('status') select-error @enderror" required>
                                <option value="1" @if($admin->status === 1 || $admin->status === '1') selected @endif>🟢 Hoạt động</option>
                                <option value="0" @if($admin->status === 0 || $admin->status === '0') selected @endif>🔴 Vô hiệu hóa</option>
                            </select>
                            @error('status') <span class="text-error text-sm mt-1"><i class="fa-solid fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3 justify-end pt-4 border-t border-base-300">
                    <a href="{{ route('admin.index') }}" class="btn btn-outline rounded-lg">
                        <i class="fa-solid fa-xmark"></i> Hủy
                    </a>
                    <button type="submit" class="btn btn-primary rounded-lg">
                        <i class="fa-solid fa-floppy-disk"></i> Lưu Thay Đổi
                    </button>
                </div>
            </form>
        </div>

        <!-- Info Card -->
        <div class="lg:col-span-1">
            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-xl p-6 border border-indigo-200 dark:border-indigo-800 sticky top-20 space-y-4">
                <h3 class="font-bold text-base-content flex items-center gap-2">
                    <i class="fa-solid fa-lightbulb text-yellow-500"></i> Thông tin tài khoản
                </h3>

                <div class="space-y-3 text-sm">
                    <div>
                        <p class="font-semibold text-base-content">📧 Email</p>
                        <p class="text-gray-600 dark:text-gray-400">{{ $admin->email }}</p>
                    </div>

                    <div>
                        <p class="font-semibold text-base-content">📅 Ngày tạo</p>
                        <p class="text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($admin->created_at)->format('d/m/Y H:i') }}</p>
                    </div>

                    <div>
                        <p class="font-semibold text-base-content">🔄 Cập nhật lần cuối</p>
                        <p class="text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($admin->updated_at)->format('d/m/Y H:i') }}</p>
                    </div>

                    <div>
                        <p class="font-semibold text-base-content">👑 Vai trò hiện tại</p>
                        @php
                            $roleLabel = match($admin->role) {
                                'admin' => 'Admin (Toàn quyền)',
                                'moderator' => 'Moderator (Quản lý)',
                                'support' => 'Support (Hỗ trợ)',
                                default => 'Không xác định'
                            };
                        @endphp
                        <p class="text-gray-600 dark:text-gray-400">{{ $roleLabel }}</p>
                    </div>

                    <div>
                        <p class="font-semibold text-base-content">✅ Trạng thái hiện tại</p>
                        @if($admin->status == 1)
                            <p class="text-green-600 dark:text-green-400">🟢 Hoạt động</p>
                        @else
                            <p class="text-red-600 dark:text-red-400">🔴 Vô hiệu hóa</p>
                        @endif
                    </div>
                </div>

                <div class="alert alert-info rounded-lg text-sm">
                    <i class="fa-solid fa-info-circle"></i>
                    <span>Vô hiệu hóa tài khoản sẽ chặn đăng nhập mà không xóa dữ liệu</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
