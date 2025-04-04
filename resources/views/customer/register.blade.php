<!DOCTYPE html>
<html data-theme="light" lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký | FlashTM</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .auth-bg {
            background: url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=1470&auto=format&fit=crop') no-repeat center center;
            background-size: cover;
        }
        .auth-card {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
        }
    </style>
</head>
<body class="min-h-screen auth-bg flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="card auth-card shadow-2xl rounded-xl overflow-hidden">
            <div class="card-body p-8">
                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-r from-green-500 to-teal-500 flex items-center justify-center">
                        <i class="fas fa-user-plus text-3xl text-white"></i>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-3xl font-bold text-center mb-2 text-gray-800">Tạo tài khoản mới</h1>
                <p class="text-center text-gray-600 mb-6">Điền thông tin để bắt đầu</p>

                <!-- Success Message -->
                @if (session('success'))
                <div class="alert alert-success shadow-lg mb-4">
                    <div>
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                <!-- Register Form -->
                <form action="{{ route('customer.registerprocess') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Avatar Upload -->
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-semibold">Ảnh đại diện*</span>
                        </label>
                        <input type="file" name="image" class="file-input file-input-bordered file-input-primary w-full" required>
                    </div>

                    <!-- Name -->
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-semibold">Họ và tên*</span>
                        </label>
                        <input type="text" placeholder="Nguyễn Văn A"
                               class="input input-bordered w-full"
                               name="name"
                               id="name"
                               required>
                    </div>

                    <!-- Email -->
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-semibold">Email*</span>
                        </label>
                        <input type="email" placeholder="email@example.com"
                               class="input input-bordered w-full"
                               id="email"
                               name="email"
                               required>
                    </div>

                    <!-- Password -->
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-semibold">Mật khẩu*</span>
                            <span class="label-text-alt">(Ít nhất 8 ký tự)</span>
                        </label>
                        <input type="password" placeholder="••••••••"
                               class="input input-bordered w-full"
                               minlength="8"
                               id="password"
                               name="password"
                               required>
                    </div>

                    <!-- Date of Birth -->
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-semibold">Ngày sinh*</span>
                        </label>
                        <input type="date"
                               class="input input-bordered w-full"
                               id="date_of_birth"
                               name="date_of_birth"
                               required>
                    </div>

                    <!-- Gender -->
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-semibold">Giới tính*</span>
                        </label>
                        <select class="select select-bordered w-full"
                                name="gender"
                                id="gender"
                                required>
                            <option disabled selected>Chọn giới tính</option>
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                            <option value="other">Khác</option>
                        </select>
                    </div>

                    <!-- Phone -->
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-semibold">Số điện thoại*</span>
                        </label>
                        <input type="tel" placeholder="0123456789"
                               pattern="[0-9]{10}"
                               class="input input-bordered w-full"
                               name="phone"
                               id="phone"
                               required>
                    </div>

                    <!-- Address -->
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-semibold">Địa chỉ</span>
                        </label>
                        <input type="text" placeholder="Số nhà, đường, quận, thành phố"
                               class="input input-bordered w-full"
                               id="address"
                               name="address">
                    </div>

                    <!-- Terms -->
                    <div class="form-control mb-6">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" class="checkbox checkbox-primary" required>
                            <span class="label-text">Tôi đồng ý với <a href="#" class="link link-primary">điều khoản sử dụng</a></span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-control mb-4">
                        <button type="submit" class="btn btn-primary gap-2">
                            <i class="fas fa-user-plus"></i>
                            Đăng ký tài khoản
                        </button>
                    </div>

                    <!-- Login Link -->
                    <p class="text-center">
                        Đã có tài khoản?
                        <a href="{{ route('customer.login') }}" class="link link-primary font-semibold">Đăng nhập ngay</a>
                    </p>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6 text-gray-600 text-sm">
            <p>© {{ date('Y') }} FlashTM. Bảo lưu mọi quyền.</p>
        </div>
    </div>
</body>
</html>
