@extends("app")

@section('title', 'Quản lý Admin')

@section("content")
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-base-content">👥 Quản lý Quản Trị Viên</h1>
            <p class="text-sm text-gray-500 mt-1">Quản lý toàn bộ tài khoản quản trị viên trong hệ thống</p>
        </div>
        <a href="{{ route('admin.create') }}" class="btn btn-primary rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fa-solid fa-plus"></i> Thêm Quản Trị Viên
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Tổng người dùng -->
        <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80 font-medium">Tổng Quản Trị Viên</p>
                    <p class="text-3xl font-bold mt-2">{{ count($admins ?? []) }}</p>
                </div>
                <div class="text-5xl opacity-20">👥</div>
            </div>
        </div>

        <!-- Đang hoạt động -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80 font-medium">Hoạt Động</p>
                    <p class="text-3xl font-bold mt-2">{{ count(($admins ?? [])->filter(fn($a) => $a->status == 1)) }}</p>
                </div>
                <div class="text-5xl opacity-20">✅</div>
            </div>
        </div>

        <!-- Bị khóa -->
        <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80 font-medium">Bị Khóa</p>
                    <p class="text-3xl font-bold mt-2">{{ count(($admins ?? [])->filter(fn($a) => $a->status == 0)) }}</p>
                </div>
                <div class="text-5xl opacity-20">🔒</div>
            </div>
        </div>

        <!-- Admin -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80 font-medium">Admin</p>
                    <p class="text-3xl font-bold mt-2">{{ count(($admins ?? [])->filter(fn($a) => $a->role === 'admin')) }}</p>
                </div>
                <div class="text-5xl opacity-20">👑</div>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-base-100 rounded-xl shadow-lg border border-base-300 overflow-hidden">
        <livewire:admin-list />
    </div>
</div>
@endsection
