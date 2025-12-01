<!DOCTYPE html>
<html lang="vi" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlashTech - Đăng Nhập Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gradient-to-br from-indigo-900 via-purple-900 to-black min-h-screen flex items-center justify-center p-4">

<!-- Background Animation -->
<div class="fixed inset-0 -z-10 overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse" style="animation-delay: 2s"></div>
    <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse" style="animation-delay: 4s"></div>
</div>

<div class="w-full max-w-md">
    <!-- Logo & Title -->
    <div class="text-center mb-8">
        <div class="flex justify-center mb-4">
            <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-2xl">
                <i class="fas fa-bolt text-white text-2xl"></i>
            </div>
        </div>
        <h1 class="text-4xl font-bold text-white mb-2">
            Flash<span class="bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">Tech</span>
        </h1>
        <p class="text-gray-400">Hệ thống quản lý admin</p>
    </div>

    <!-- Login Form -->
    <div class="bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl p-8 border border-white/20">
        <h2 class="text-2xl font-bold text-white mb-6">Đăng Nhập</h2>

        <form action="{{ route('admin.LoginProcess') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Email -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text text-white font-semibold">📧 Email</span>
                </label>
                <div class="relative">
                    <input
                        type="email"
                        name="email"
                        placeholder="admin@example.com"
                        class="input input-bordered w-full rounded-lg bg-white/5 border-white/20 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition-all"
                        required
                    >
                    <i class="fas fa-envelope absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>

            <!-- Password -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text text-white font-semibold">🔐 Mật khẩu</span>
                </label>
                <div class="relative">
                    <input
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        class="input input-bordered w-full rounded-lg bg-white/5 border-white/20 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition-all"
                        required
                    >
                    <i class="fas fa-lock absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="checkbox checkbox-sm rounded">
                    <span class="text-sm text-gray-300">Ghi nhớ tài khoản</span>
                </label>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full btn bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 border-0 text-white font-bold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 py-3"
            >
                <i class="fas fa-sign-in-alt"></i> Đăng Nhập
            </button>
        </form>

        <!-- Divider -->
        <div class="divider divider-neutral my-6 before:bg-white/10 after:bg-white/10"></div>

        <!-- Info Box -->
        <div class="bg-indigo-500/20 border border-indigo-500/30 rounded-lg p-4 mb-4">
            <p class="text-sm text-indigo-200">
                <i class="fas fa-info-circle mr-2"></i>
                <strong>Demo Credentials:</strong><br>
                Email: admin@example.com<br>
                Password: 12345678
            </p>
        </div>
    </div>

    <!-- Footer -->
    <div class="text-center mt-8 text-gray-400 text-sm">
        <p>© {{ date('Y') }} FlashTech. Bảo lưu tất cả quyền.</p>
        <p class="mt-2 text-xs">Được phát triển bởi <span class="text-indigo-400 font-semibold">FlashTM</span></p>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Handle flash messages
        @if(session('error'))
            Swal.fire({
                title: "❌ Lỗi!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonColor: "#ef4444",
                confirmButtonText: "OK",
                background: '#1a1a2e',
                color: '#ffffff'
            });
        @endif

        @if(session('success'))
            Swal.fire({
                title: "✅ Thành công!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonColor: "#10b981",
                confirmButtonText: "OK",
                background: '#1a1a2e',
                color: '#ffffff'
            });
        @endif

        // Form submission with loading
        const loginForm = document.querySelector("form");

        loginForm.addEventListener("submit", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "⏳ Đang đăng nhập...",
                text: "Vui lòng chờ một chút",
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                },
                background: '#1a1a2e',
                color: '#ffffff'
            });

            setTimeout(() => {
                loginForm.submit();
            }, 500);
        });
    });
</script>

</body>
</html>
