@extends('app')

@section('title', 'Edit Admin')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-800 via-purple-800 to-pink-700 py-12 px-6">
    <div class="w-full max-w-4xl bg-white/90 backdrop-blur-sm dark:bg-gray-900/80 rounded-3xl shadow-2xl p-10 animate-fade-in-up">
        <h2 class="text-4xl font-extrabold text-center text-purple-800 dark:text-white mb-6 tracking-wide">
            🛠️ Edit Admin Info
        </h2>
        <p class="text-center text-sm text-gray-500 dark:text-gray-300 mb-10">Update the admin information below.</p>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <strong class="font-bold">⚠️ Oops! Có lỗi rồi:</strong>
                <ul class="list-disc ml-5 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data" class="grid sm:grid-cols-2 gap-8">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label class="label-text font-semibold text-purple-700 dark:text-white">👤 Full Name</label>
                <input type="text" name="name" value="{{ $admin->name }}" class="input input-bordered input-lg w-full mt-2 shadow-inner" required>
            </div>

            <!-- Email -->
            <div>
                <label class="label-text font-semibold text-purple-700 dark:text-white">📧 Email Address</label>
                <input type="email" name="email" value="{{ $admin->email }}" class="input input-bordered input-lg w-full mt-2 shadow-inner" required>
            </div>

            <!-- Password -->
            <div>
                <label class="label-text font-semibold text-purple-700 dark:text-white">🔐 Password</label>
                <input type="password" name="password" value="{{ $admin->password }}" class="input input-bordered input-lg w-full mt-2 shadow-inner">
            </div>

            <!-- Phone -->
            <div>
                <label class="label-text font-semibold text-purple-700 dark:text-white">📱 Phone Number</label>
                <input type="text" name="phone" value="{{ $admin->phone }}" class="input input-bordered input-lg w-full mt-2 shadow-inner">
            </div>

            <!-- Buttons -->
            <div class="col-span-2 flex flex-col sm:flex-row justify-center items-center gap-6 mt-8">
                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-purple-600 to-pink-500 text-white font-bold rounded-full shadow-lg hover:scale-105 transition-all duration-300 hover:from-pink-500 hover:to-yellow-500 hover:shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 576 512" stroke="currentColor">
                        <path fill="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0z"/>
                    </svg>
                    Update Admin
                </button>

                <a href="{{ route('admin.index') }}" class="px-8 py-3 border border-purple-500 text-purple-700 dark:text-white font-semibold rounded-full hover:bg-purple-600 hover:text-white transition-all duration-300">
                    ⬅️ Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('update_success'))
    Swal.fire({
        title: "✅ Đã cập nhật!",
        text: "Thông tin admin đã được cập nhật thành công.",
        icon: "success",
        confirmButtonColor: "#6366f1",
        confirmButtonText: "OK"
    });
    @endif
</script>

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
