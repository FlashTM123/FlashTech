@extends('app')

@section('title', 'Add Admin')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-800 via-purple-800 to-pink-700 py-12 px-6">
    <div class="w-full max-w-4xl bg-white/90 backdrop-blur-sm dark:bg-gray-900/80 rounded-3xl shadow-2xl p-10 animate-fade-in-up">
        <h2 class="text-4xl font-extrabold text-center text-purple-800 dark:text-white mb-6 tracking-wide">
            ✨ Thêm Quản Trị Viên Mới
        </h2>
        <p class="text-center text-sm text-gray-500 dark:text-gray-300 mb-10">Điền vào biểu mẫu bên dưới để tạo quản trị viên mới cho bảng điều khiển FlashGear của bạn.</p>

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="grid sm:grid-cols-2 gap-8">
            @csrf

            <!-- Name -->
            <div>
                <label class="label-text font-semibold text-purple-700 dark:text-white">👤 Họ tên</label>
                <input type="text" name="name" class="input input-bordered input-lg w-full mt-2 shadow-inner" placeholder="Nguyễn Văn A" required>
            </div>

            <!-- Email -->
            <div>
                <label class="label-text font-semibold text-purple-700 dark:text-white">📧 Email </label>
                <input type="email" name="email" class="input input-bordered input-lg w-full mt-2 shadow-inner" placeholder="admin@gmail.vn" required>
            </div>

            <!-- Password -->
            <div>
                <label class="label-text font-semibold text-purple-700 dark:text-white">🔐 Mật khẩu</label>
                <input type="password" name="password" class="input input-bordered input-lg w-full mt-2 shadow-inner" placeholder="••••••" required>
            </div>

            <!-- Phone -->
            <div>
                <label class="label-text font-semibold text-purple-700 dark:text-white">📱 SĐT</label>
                <input type="text" name="phone" class="input input-bordered input-lg w-full mt-2 shadow-inner" placeholder="09xxxxxxxx">
            </div>

            <!-- Buttons -->
            <div class="col-span-2 flex flex-col sm:flex-row justify-center items-center gap-6 mt-8">
                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-purple-600 to-pink-500 text-white font-bold rounded-full shadow-lg hover:scale-105 transition-all duration-300 hover:from-pink-500 hover:to-yellow-500 hover:shadow-xl">

                    ➕ Thêm
                </button>

                <a href="{{ route('admin.index') }}" class="px-8 py-3 border border-purple-500 text-purple-700 dark:text-white font-semibold rounded-full hover:bg-purple-600 hover:text-white transition-all duration-300">
                    ⬅️ Hủy
                </a>
            </div>
        </form>
    </div>
</div>



<style>
    @keyframes fade-in-up {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }
</style>
@endsection
