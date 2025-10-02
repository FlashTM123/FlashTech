<div class="p-6 bg-base-100 rounded-3xl shadow-2xl">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-2xl font-bold tracking-tight text-base-content">👑 Quản lý Quản trị viên</h2>
        <a href="{{ route('admin.create') }}" class="btn btn-outline btn-primary btn-md rounded-xl shadow hover:scale-105 transition-transform">
            ➕ Thêm quản trị viên
        </a>
    </div>

    <!-- Table -->
    <div class="my-3">

        <div class="overflow-x-auto">
            <table class="table w-full text-center">
                <thead class="bg-base-200 text-base-content">
                    <tr class="text-sm">
                        <th>#</th>
                        <th>👤 Tên</th>
                        <th>📧 Email</th>
                        <th>🔒 Mật khẩu (mã hóa)</th>
                        <th>📞 Điện thoại</th>
                        <th>📆 Tạo lúc</th>
                        <th>🕓 Cập nhật</th>
                        <th>⚙️ Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $index => $admin)
                        <tr class="hover:bg-base-300/30 transition-colors duration-200">
                            <td>{{ $index + 1 }}</td>
                            <td class="font-medium">{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <span class="badge badge-outline badge-primary text-xs">{{$admin->password}}</span>
                            </td>
                            <td>{{ $admin->phone }}</td>
                            <td>{{ \Carbon\Carbon::parse($admin->created_at)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($admin->updated_at)->format('d/m/Y') }}</td>
                            <td>
                                <div class="flex justify-center gap-2">
                                    <!-- Edit -->
                                    <a href="{{ route('admin.edit', $admin->id) }}"
                                       class="btn btn-outline btn-warning">
                                        📝
                                    </a>
    
                                    <!-- Delete -->
                                    <button type="button" class="btn btn-outline btn-error" wire:click='delete({{$admin->id}})'>🗑️</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- SweetAlert -->

</div>
