<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký | FlashTech</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
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

        .input-glass option {
            background: #0f172a;
            color: white;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center relative overflow-hidden py-8">
    <!-- Animated Blobs -->
    <div class="blob" style="z-index: 1;"></div>
    <div class="blob" style="z-index: 1;"></div>
    <div class="blob" style="z-index: 1;"></div>

    <!-- Container -->
    <div class="relative z-10 w-full max-w-2xl mx-4">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full glassmorphic mb-4">
                <i class="fa-solid fa-user-plus text-2xl text-indigo-300"></i>
            </div>
            <h1 class="text-4xl font-extrabold bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent mb-2">
                Tạo tài khoản mới
            </h1>
            <p class="text-gray-300 text-sm">Nhanh chóng & dễ dàng - chỉ mất chưa đến 1 phút!</p>
        </div>

        <!-- Register Card -->
        <div class="glassmorphic rounded-2xl p-8 space-y-6">
            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-500/20 border border-green-400/50 text-green-200 px-4 py-3 rounded-lg flex items-start gap-3">
                    <i class="fa-solid fa-circle-check mt-0.5"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('customer.registerprocess') }}" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <!-- Avatar Upload -->
                <div class="space-y-2">
                    <label class="text-gray-200 text-sm font-medium flex items-center gap-2">
                        <i class="fa-solid fa-image text-indigo-400"></i>
                        Ảnh đại diện
                    </label>
                    <div class="relative">
                        <input
                            type="file"
                            name="image"
                            id="avatar-input"
                            class="hidden"
                            accept="image/*"
                            required
                        >
                        <label for="avatar-input" class="block w-full px-4 py-3 rounded-lg input-glass cursor-pointer hover:bg-white/10 transition text-center">
                            <i class="fa-solid fa-cloud-arrow-up text-indigo-400 mr-2"></i>
                            <span class="text-gray-300">Chọn ảnh đại diện</span>
                        </label>
                    </div>
                    @error('image')
                        <p class="text-red-400 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Name & Email Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-2">
                        <label class="text-gray-200 text-sm font-medium flex items-center gap-2">
                            <i class="fa-solid fa-user text-indigo-400"></i>
                            Họ và tên
                        </label>
                        <input
                            type="text"
                            name="name"
                            class="w-full px-4 py-3 rounded-lg input-glass"
                            placeholder="Nguyễn Văn A"
                            value="{{ old('name') }}"
                            required
                        >
                        @error('name')
                            <p class="text-red-400 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-gray-200 text-sm font-medium flex items-center gap-2">
                            <i class="fa-solid fa-envelope text-indigo-400"></i>
                            Email
                        </label>
                        <input
                            type="email"
                            name="email"
                            class="w-full px-4 py-3 rounded-lg input-glass"
                            placeholder="your@email.com"
                            value="{{ old('email') }}"
                            required
                        >
                        @error('email')
                            <p class="text-red-400 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Password & Phone Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-2">
                        <label class="text-gray-200 text-sm font-medium flex items-center gap-2">
                            <i class="fa-solid fa-lock text-indigo-400"></i>
                            Mật khẩu
                        </label>
                        <input
                            type="password"
                            name="password"
                            class="w-full px-4 py-3 rounded-lg input-glass"
                            placeholder="••••••••"
                            required
                        >
                        @error('password')
                            <p class="text-red-400 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-gray-200 text-sm font-medium flex items-center gap-2">
                            <i class="fa-solid fa-phone text-indigo-400"></i>
                            Số điện thoại
                        </label>
                        <input
                            type="text"
                            name="phone"
                            class="w-full px-4 py-3 rounded-lg input-glass"
                            placeholder="0123456789"
                            value="{{ old('phone') }}"
                            required
                        >
                        @error('phone')
                            <p class="text-red-400 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Date of Birth & Gender Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-2">
                        <label class="text-gray-200 text-sm font-medium flex items-center gap-2">
                            <i class="fa-solid fa-cake-candles text-indigo-400"></i>
                            Ngày sinh
                        </label>
                        <input
                            type="date"
                            name="date_of_birth"
                            class="w-full px-4 py-3 rounded-lg input-glass"
                            value="{{ old('date_of_birth') }}"
                            required
                        >
                        @error('date_of_birth')
                            <p class="text-red-400 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-gray-200 text-sm font-medium flex items-center gap-2">
                            <i class="fa-solid fa-venus-mars text-indigo-400"></i>
                            Giới tính
                        </label>
                        <select
                            name="gender"
                            class="w-full px-4 py-3 rounded-lg input-glass"
                            required
                        >
                            <option value="" disabled selected class="text-gray-500">Chọn giới tính</option>
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                            <option value="other">Khác</option>
                        </select>
                        @error('gender')
                            <p class="text-red-400 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Address -->
                <div class="space-y-2">
                    <label class="text-gray-200 text-sm font-medium flex items-center gap-2">
                        <i class="fa-solid fa-map-pin text-indigo-400"></i>
                        Địa chỉ
                    </label>
                    <input
                        type="text"
                        name="address"
                        class="w-full px-4 py-3 rounded-lg input-glass"
                        placeholder="123 Đường ABC, Quận XYZ, Hà Nội"
                        value="{{ old('address') }}"
                    >
                    @error('address')
                        <p class="text-red-400 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Terms Checkbox -->
                <label class="flex items-start gap-3 text-sm text-gray-300">
                    <input
                        type="checkbox"
                        name="terms"
                        class="mt-1 w-4 h-4 rounded accent-indigo-500 cursor-pointer"
                        required
                    >
                    <span>Tôi đồng ý với <a href="#" class="text-indigo-400 hover:text-indigo-300 transition">điều khoản sử dụng</a> và <a href="#" class="text-indigo-400 hover:text-indigo-300 transition">chính sách bảo mật</a></span>
                </label>

                <!-- Register Button -->
                <button
                    type="submit"
                    class="w-full py-3 rounded-lg font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 flex items-center justify-center gap-2 group hover:shadow-lg hover:shadow-indigo-500/50 mt-6"
                >
                    <i class="fa-solid fa-user-plus group-hover:scale-110 transition-transform"></i>
                    Đăng ký tài khoản
                </button>

                <!-- Login Link -->
                <div class="pt-4 border-t border-gray-600/50 text-center">
                    <p class="text-gray-300 text-sm">
                        Đã có tài khoản?
                        <a href="{{ route('customer.login') }}" class="text-indigo-400 hover:text-indigo-300 font-bold transition">
                            Đăng nhập ngay
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8 text-gray-400 text-xs">
            © {{ date('Y') }} FlashTech. Tất cả quyền được bảo lưu.
        </div>
    </div>
</body>
</html>
