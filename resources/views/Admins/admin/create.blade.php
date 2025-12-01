@extends('app')

@section('title', 'Thêm Admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-base-content">➕ Thêm Người Dùng Mới</h1>
            <p class="text-sm text-gray-500 mt-1">Tạo tài khoản quản trị viên mới cho hệ thống</p>
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

            <form action="{{ route('admin.store') }}" method="POST" class="space-y-6">
                @csrf

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
                            <input type="text" name="name" value="{{ old('name') }}" class="input input-bordered rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') input-error @enderror" placeholder="Nguyễn Văn A" required>
                            @error('name') <span class="text-error text-sm mt-1"><i class="fa-solid fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Email <span class="text-error">*</span></span>
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" class="input input-bordered rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('email') input-error @enderror" placeholder="admin@example.com" required>
                            @error('email') <span class="text-error text-sm mt-1"><i class="fa-solid fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                        </div>

                        <!-- Phone -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Số điện thoại <span class="text-error">*</span></span>
                            </label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="input input-bordered rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('phone') input-error @enderror" placeholder="0901234567" required>
                            @error('phone') <span class="text-error text-sm mt-1"><i class="fa-solid fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Mật khẩu <span class="text-error">*</span></span>
                            </label>
                            <input type="password" name="password" class="input input-bordered rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('password') input-error @enderror" placeholder="••••••••" required>
                            @error('password') <span class="text-error text-sm mt-1"><i class="fa-solid fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- Vai trò -->
                <div class="space-y-4">
                    <h3 class="text-lg font-bold text-base-content flex items-center gap-2">
                        <i class="fa-solid fa-shield text-indigo-600"></i> Vai trò & Quyền hạn
                    </h3>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Chọn vai trò <span class="text-error">*</span></span>
                        </label>
                        <select name="role" class="select select-bordered rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('role') select-error @enderror" required>
                            <option value="">-- Chọn vai trò --</option>
                            <option value="admin" @if(old('role') === 'admin') selected @endif>👑 Admin - Toàn quyền hệ thống</option>
                            <option value="moderator" @if(old('role') === 'moderator') selected @endif>🛡️ Moderator - Quản lý nội dung</option>
                            <option value="employee" @if(old('role') === 'employee') selected @endif>💬 Employee - Nhân viên hỗ trợ khách hàng</option>
                        </select>
                        @error('role') <span class="text-error text-sm mt-1"><i class="fa-solid fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                    </div>

                    <div class="alert alert-info rounded-lg">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>Người dùng mới sẽ tự động ở trạng thái <strong>Hoạt động</strong></span>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3 justify-end pt-4 border-t border-base-300">
                    <a href="{{ route('admin.index') }}" class="btn btn-outline rounded-lg">
                        <i class="fa-solid fa-xmark"></i> Hủy
                    </a>
                    <button type="submit" class="btn btn-primary rounded-lg">
                        <i class="fa-solid fa-plus"></i> Tạo Người Dùng
                    </button>
                </div>
            </form>
        </div>

        <!-- Info Card -->
        <div class="lg:col-span-1">
            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-xl p-6 border border-indigo-200 dark:border-indigo-800 sticky top-20 space-y-4">
                <h3 class="font-bold text-base-content flex items-center gap-2">
                    <i class="fa-solid fa-lightbulb text-yellow-500"></i> Hướng dẫn
                </h3>

                <div class="space-y-3 text-sm">
                    <div>
                        <p class="font-semibold text-base-content">📝 Thông tin cần thiết</p>
                        <p class="text-gray-600 dark:text-gray-400">Điền đầy đủ tất cả các trường được đánh dấu (*)</p>
                    </div>

                    <div>
                        <p class="font-semibold text-base-content">🔐 Mật khẩu mạnh</p>
                        <p class="text-gray-600 dark:text-gray-400">Tối thiểu 6 ký tự, nên dùng chữ cái, số và ký tự đặc biệt</p>
                    </div>

                    <div>
                        <p class="font-semibold text-base-content">👑 Vai trò</p>
                        <ul class="space-y-1 mt-2 text-gray-600 dark:text-gray-400">
                            <li>• <strong>Admin:</strong> Toàn quyền hệ thống</li>
                            <li>• <strong>Moderator:</strong> Quản lý nội dung</li>
                            <li>• <strong>Employee:</strong> Nhân viên hỗ trợ khách hàng</li>
                        </ul>
                    </div>
                </div>

                <div class="alert alert-warning rounded-lg text-sm">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>Không thể xóa tài khoản sau khi tạo, chỉ có thể vô hiệu hóa</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
