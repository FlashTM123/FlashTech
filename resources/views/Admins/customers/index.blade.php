@extends('app')

@section('title', 'Customers List')

@section("content")
    <div class="container mx-auto p-6">
        <div class="flex flex-col gap-8">
            <!-- Premium Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 pb-6 border-b-2 border-indigo-600/20">
                <div>
                    <h2 class="text-4xl font-extrabold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">Quản lý khách hàng</h2>
                    <p class="text-gray-600 dark:text-gray-400 flex items-center gap-2">
                        <i class="fa-solid fa-users text-indigo-600 dark:text-indigo-400"></i>
                        Tổng số khách hàng: <span class="font-bold text-indigo-600 dark:text-indigo-400">{{ $customers->count() }}</span>
                    </p>
                </div>

                <!-- Stats Cards -->
                <div class="flex gap-4 w-full md:w-auto">
                    <div class="flex-1 md:flex-none px-6 py-4 rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 dark:from-blue-900/30 dark:to-blue-800/20 border border-blue-200 dark:border-blue-700/30">
                        <p class="text-xs text-blue-600 dark:text-blue-400 font-semibold uppercase tracking-wide">Active</p>
                        <p class="text-2xl font-bold text-blue-700 dark:text-blue-300">{{ $customers->where('created_at', '>=', now()->subDays(30))->count() }}</p>
                    </div>
                    <div class="flex-1 md:flex-none px-6 py-4 rounded-xl bg-gradient-to-br from-green-100 to-green-50 dark:from-green-900/30 dark:to-green-800/20 border border-green-200 dark:border-green-700/30">
                        <p class="text-xs text-green-600 dark:text-green-400 font-semibold uppercase tracking-wide">Total</p>
                        <p class="text-2xl font-bold text-green-700 dark:text-green-300">{{ $customers->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Table with Premium Design -->
            <div class="overflow-x-auto rounded-2xl border border-indigo-600/20 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-indigo-600/10 to-purple-600/10 dark:from-indigo-600/20 dark:to-purple-600/20 border-b-2 border-indigo-600/20">
                        <tr>
                            <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">#</th>
                            <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Khách hàng</th>
                            <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Email</th>
                            <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Ngày sinh</th>
                            <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Giới tính</th>
                            <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Điện thoại</th>
                            <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Địa chỉ</th>
                            <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($customers as $index => $customer)
                            <tr class="hover:bg-indigo-50/50 dark:hover:bg-indigo-900/10 transition-all duration-300 group">
                                <td class="text-center px-6 py-4">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm font-bold">
                                        {{ $index + 1 }}
                                    </span>
                                </td>

                                <td class="text-center px-6 py-4">
                                    <div class="flex items-center justify-center gap-3 group-hover:scale-105 transition-transform">
                                        <div class="avatar">
                                            <div class="w-10 h-10 rounded-full ring ring-indigo-500 ring-offset-base-100 ring-offset-2 shadow-lg">
                                                <img src="{{ asset('images/' . $customer->image) }}" alt="{{ $customer->name }}" class="object-cover group-hover:scale-110 transition-transform">
                                            </div>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold text-gray-900 dark:text-white">{{ $customer->name }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">ID: {{ substr($customer->_id, -6) }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center px-6 py-4">
                                    <div class="group/email relative inline-block">
                                        <span class="text-sm text-indigo-600 dark:text-indigo-400 font-medium truncate max-w-[150px] inline-block cursor-help">
                                            {{ $customer->email }}
                                        </span>
                                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 rounded-lg bg-gray-900 dark:bg-gray-950 text-white text-xs whitespace-nowrap opacity-0 group-hover/email:opacity-100 transition-opacity pointer-events-none z-10 before:content-[''] before:absolute before:top-full before:left-1/2 before:-translate-x-1/2 before:border-4 before:border-transparent before:border-t-gray-900">
                                            {{ $customer->email }}
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center px-6 py-4">
                                    <span class="text-sm text-gray-700 dark:text-gray-300 font-medium">
                                        {{ \Carbon\Carbon::parse($customer->date_of_birth)->format('d/m/Y') }}
                                    </span>
                                </td>

                                <td class="text-center px-6 py-4">
                                    @if($customer->gender === 'Male')
                                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-sm font-semibold">
                                            <i class="fa-solid fa-mars text-lg"></i>
                                            {{ $customer->gender }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-pink-100 dark:bg-pink-900/30 text-pink-700 dark:text-pink-300 text-sm font-semibold">
                                            <i class="fa-solid fa-venus text-lg"></i>
                                            {{ $customer->gender }}
                                        </span>
                                    @endif
                                </td>

                                <td class="text-center px-6 py-4">
                                    <span class="text-sm text-gray-700 dark:text-gray-300 font-medium flex items-center justify-center gap-2">
                                        <i class="fa-solid fa-phone text-indigo-600 dark:text-indigo-400"></i>
                                        {{ $customer->phone }}
                                    </span>
                                </td>

                                <td class="text-center px-6 py-4">
                                    <div class="group/address relative">
                                        <span class="text-sm text-gray-700 dark:text-gray-300 truncate max-w-[120px] inline-block cursor-help">
                                            {{ $customer->address }}
                                        </span>
                                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-2 rounded-lg bg-gray-900 dark:bg-gray-950 text-white text-xs whitespace-normal max-w-xs opacity-0 group-hover/address:opacity-100 transition-opacity pointer-events-none z-10 before:content-[''] before:absolute before:top-full before:left-1/2 before:-translate-x-1/2 before:border-4 before:border-transparent before:border-t-gray-900">
                                            {{ $customer->address }}
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center px-6 py-4">
                                    <span class="inline-flex items-center gap-2 text-xs font-semibold">
                                        <i class="fa-solid fa-calendar text-amber-500"></i>
                                        <span class="text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($customer->created_at)->diffForHumans() }}</span>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-16">
                                    <div class="flex flex-col items-center gap-4">
                                        <i class="fa-solid fa-inbox text-5xl text-gray-300 dark:text-gray-600"></i>
                                        <p class="text-lg text-gray-600 dark:text-gray-400 font-semibold">Không có khách hàng nào</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Add animation on page load
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                row.style.animation = `fadeInUp 0.5s ease-out ${index * 0.05}s forwards`;
                row.style.opacity = '0';
            });
        });

        // Add CSS animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateX(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
        `;
        document.head.appendChild(style);
    </script>
@endsection
