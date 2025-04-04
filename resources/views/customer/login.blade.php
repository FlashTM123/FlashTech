<!DOCTYPE html>
<html data-theme="light" lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | FlashTM</title>
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
            background-color: rgba(255, 255, 255, 0.85);
        }
    </style>
</head>
<body class="min-h-screen auth-bg flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="card auth-card shadow-2xl rounded-xl overflow-hidden">
            <div class="card-body p-8">
                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                        <i class="fas fa-lock-open text-3xl text-white"></i>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-3xl font-bold text-center mb-2 text-gray-800">Chào mừng trở lại</h1>
                <p class="text-center text-gray-600 mb-6">Đăng nhập để tiếp tục trải nghiệm</p>

                <!-- Error Message -->
                @if (session('error'))
                <div class="alert alert-error shadow-lg mb-4">
                    <div>
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('customer.loginprocess') }}" method="POST">
                    @csrf
                    <!-- Email Input -->
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-semibold">Email</span>
                        </label>
                        <label class="input input-bordered flex items-center gap-2">
                            <i class="fas fa-envelope text-gray-400"></i>
                            <input type="email"
                                   class="grow"
                                   placeholder="email@example.com"
                                   id="email"
                                   name="email"
                                   required />
                        </label>
                    </div>

                    <!-- Password Input -->
                    <div class="form-control mb-2">
                        <label class="label">
                            <span class="label-text font-semibold">Mật khẩu</span>
                        </label>
                        <label class="input input-bordered flex items-center gap-2">
                            <i class="fas fa-lock text-gray-400"></i>
                            <input type="password"
                                   class="grow"
                                   placeholder="••••••••"
                                   id="password"
                                   name="password"
                                   required />
                        </label>
                        <label class="label">
                            <a href="forgot-password.html" class="label-text-alt link link-hover text-primary">Quên mật khẩu?</a>
                        </label>
                    </div>

                    <!-- Remember Me -->
                    <div class="form-control mb-6">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" class="checkbox checkbox-primary checkbox-sm" />
                            <span class="label-text">Ghi nhớ đăng nhập</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-control mb-6">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="divider">hoặc tiếp tục với</div>

                    <!-- Social Login -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <button class="btn btn-outline">
                            <i class="fab fa-google text-red-500 mr-2"></i> Google
                        </button>
                        <button class="btn btn-outline">
                            <i class="fab fa-facebook-f text-blue-600 mr-2"></i> Facebook
                        </button>
                    </div>

                    <!-- Register Link -->
                    <p class="text-center">
                        Chưa có tài khoản?
                        <a href="{{ route('customer.register')}}" class="link link-primary font-semibold">Tạo tài khoản mới</a>
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
