<!DOCTYPE html>
<html data-theme="light" lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | Tên Công Ty</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .auth-bg {
            background-image: linear-gradient(to bottom right, #f0f9ff, #e0f2fe);
        }
    </style>
</head>
<body class="min-h-screen auth-bg flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="card bg-white shadow-lg rounded-2xl overflow-hidden">
            <figure class="px-10 pt-10 bg-gradient-to-r from-blue-500 to-purple-600 h-32 flex items-center justify-center">
                <i class="fas fa-user-lock text-6xl text-white"></i>
            </figure>
            <div class="card-body">
                <h2 class="text-2xl font-bold text-center mb-1">Đăng nhập tài khoản</h2>
                <p class="text-center text-gray-500 mb-6">Vui lòng nhập thông tin đăng nhập</p>
                @if (session('error'))
                    <p>{{ session('error')}}</p>
                @endif
                <form action="{{ route('customer.loginprocess') }}" method="POST">
                    @csrf
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-medium">Email</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </span>
                            <input type="email" placeholder="email@example.com"
                                   class="input input-bordered w-full pl-10" id="email" name="email" required />
                        </div>
                    </div>

                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-medium">Mật khẩu</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="fas fa-lock text-gray-400"></i>
                            </span>
                            <input type="password" placeholder="••••••••"
                                   class="input input-bordered w-full pl-10" id="password" name="password" required />
                        </div>
                        <label class="label">
                            <a href="forgot-password.html" class="label-text-alt link link-hover text-blue-600">Quên mật khẩu?</a>
                        </label>
                    </div>

                    <div class="form-control mb-6">
                        <button class="btn btn-primary bg-gradient-to-r from-blue-500 to-purple-600
                                      border-none text-white hover:from-blue-600 hover:to-purple-700
                                      transition-all duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập
                        </button>
                    </div>

                    <div class="flex items-center mb-6">
                        <div class="flex-1 border-t border-gray-300"></div>
                        <span class="px-4 text-gray-500">hoặc</span>
                        <div class="flex-1 border-t border-gray-300"></div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <button class="btn btn-outline btn-ghost">
                            <i class="fab fa-google text-red-500 mr-2"></i> Google
                        </button>
                        <button class="btn btn-outline btn-ghost">
                            <i class="fab fa-facebook-f text-blue-600 mr-2"></i> Facebook
                        </button>
                    </div>

                    <p class="text-center">
                        Chưa có tài khoản?
                        <a href="{{ route('customer.register')}}" class="link link-primary font-medium">Đăng ký ngay</a>
                    </p>
                </form>
            </div>
        </div>

        <div class="text-center mt-6 text-gray-500 text-sm">
            <aside>
                <p>Copyright © {{ date('Y') }} - All right reserved by FlashTM's teams</p>
            </aside>        </div>
    </div>
</body>
</html>
