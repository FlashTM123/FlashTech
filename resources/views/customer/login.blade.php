<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | FlashTech</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 25%, #2e1065 50%, #0f172a 75%, #1a1a2e 100%);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .blob {
            position: fixed;
            border-radius: 50%;
            mix-blend-mode: multiply;
            filter: blur(40px);
            opacity: 0.7;
            animation: blob-animation 8s infinite;
        }

        .blob:nth-child(1) {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            top: -50px;
            right: -100px;
            animation-delay: 0s;
        }

        .blob:nth-child(2) {
            width: 250px;
            height: 250px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            bottom: -100px;
            left: -50px;
            animation-delay: 2s;
        }

        .blob:nth-child(3) {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            bottom: 50px;
            right: 50px;
            animation-delay: 4s;
        }

        @keyframes blob-animation {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
        }

        .glassmorphic {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }

        .input-glass {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            transition: all 0.3s ease;
        }

        .input-glass::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .input-glass:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border-color: #818cf8;
            box-shadow: 0 0 20px rgba(129, 140, 248, 0.3);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center relative overflow-hidden">
    <!-- Animated Background Blobs -->
    <div class="blob" style="z-index: 1;"></div>
    <div class="blob" style="z-index: 1;"></div>
    <div class="blob" style="z-index: 1;"></div>

    <!-- Container -->
    <div class="relative z-10 max-w-md w-full mx-4">
        <!-- Logo -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full glassmorphic mb-4">
                <i class="fa-solid fa-bolt text-2xl text-indigo-300"></i>
            </div>
            <h1 class="text-4xl font-extrabold bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent mb-2">
                FlashTech
            </h1>
            <p class="text-gray-300 text-sm">Chào mừng bạn quay lại</p>
        </div>

        <!-- Login Card -->
        <div class="glassmorphic rounded-2xl p-8 space-y-6">
            <!-- Error Message -->
            @if (session('error'))
                <div class="bg-red-500/20 border border-red-400/50 text-red-200 px-4 py-3 rounded-lg flex items-start gap-3">
                    <i class="fa-solid fa-circle-exclamation mt-0.5"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('customer.loginprocess') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email Input -->
                <div class="space-y-2">
                    <label class="text-gray-200 text-sm font-medium flex items-center gap-2">
                        <i class="fa-solid fa-envelope text-indigo-400"></i>
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        required
                        class="w-full px-4 py-3 rounded-lg input-glass"
                        placeholder="your@email.com"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="space-y-2">
                    <label class="text-gray-200 text-sm font-medium flex items-center gap-2">
                        <i class="fa-solid fa-lock text-indigo-400"></i>
                        Mật khẩu
                    </label>
                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full px-4 py-3 rounded-lg input-glass"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 text-gray-300 cursor-pointer hover:text-white transition">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded accent-indigo-500">
                        <span>Ghi nhớ đăng nhập</span>
                    </label>
                    <a href="#" class="text-indigo-400 hover:text-indigo-300 transition font-medium">
                        Quên mật khẩu?
                    </a>
                </div>

                <!-- Login Button -->
                <button
                    type="submit"
                    class="w-full py-3 rounded-lg font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 flex items-center justify-center gap-2 group hover:shadow-lg hover:shadow-indigo-500/50"
                >
                    <i class="fa-solid fa-sign-in-alt group-hover:translate-x-1 transition-transform"></i>
                    Đăng nhập
                </button>

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-gray-600 to-transparent h-px"></div>
                    <div class="relative flex justify-center text-xs">
                        <span class="px-2 text-gray-400 glassmorphic rounded-full">hoặc tiếp tục với</span>
                    </div>
                </div>

                <!-- Social Buttons -->
                <div class="grid grid-cols-2 gap-3">
                    <button type="button" class="py-2 rounded-lg glassmorphic text-white hover:bg-red-500/20 transition flex items-center justify-center gap-2 group">
                        <i class="fab fa-google text-red-400"></i>
                    </button>
                    <button type="button" class="py-2 rounded-lg glassmorphic text-white hover:bg-blue-500/20 transition flex items-center justify-center gap-2 group">
                        <i class="fab fa-facebook-f text-blue-400"></i>
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            <div class="pt-4 border-t border-gray-600/50 text-center">
                <p class="text-gray-300 text-sm">
                    Chưa có tài khoản?
                    <a href="{{ route('customer.register') }}" class="text-indigo-400 hover:text-indigo-300 font-bold transition">
                        Đăng ký ngay
                    </a>
                </p>
            </div>
        </div>

        <!-- Info Box -->
        <div class="mt-6 glassmorphic rounded-xl p-4 text-xs text-gray-300">
            <p class="font-semibold text-indigo-300 mb-2">
                <i class="fa-solid fa-circle-info mr-2"></i>Tài khoản demo
            </p>
            <p>Email: <code class="text-indigo-200">demo@example.com</code></p>
            <p>Mật khẩu: <code class="text-indigo-200">password123</code></p>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8 text-gray-400 text-xs">
            © {{ date('Y') }} FlashTech. Tất cả quyền được bảo lưu.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
