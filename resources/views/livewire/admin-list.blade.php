<div class="p-6 bg-base-100 rounded-xl shadow-lg">
    <!-- Filters & Search -->
    <div class="flex flex-col sm:flex-row gap-3 items-center mb-6">
        <div class="form-control flex-1">
            <input type="text" placeholder="🔍 Tìm kiếm theo tên, email, số điện thoại..." class="input input-bordered rounded-lg" />
        </div>
        <select wire:model.live="selectedRole" class="select select-bordered select-sm rounded-lg w-full sm:w-48">
            <option value="">🧑 Tất cả vai trò</option>
            <option value="admin">👑 Admin</option>
            <option value="moderator">🛡️ Moderator</option>
            <option value="support">💬 Support</option>
        </select>
        <select wire:model.live="selectedStatus" class="select select-bordered select-sm rounded-lg w-full sm:w-48">
            <option value="">✅ Tất cả trạng thái</option>
            <option value="1">Hoạt động</option>
            <option value="0">Vô hiệu hóa</option>
        </select>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead class="bg-base-200 text-base-content">
                <tr class="text-sm">
                    <th>#</th>
                    <th>👤 Tên</th>
                    <th>📧 Email</th>
                    <th>📞 Điện thoại</th>
                    <th>🧑 Vai trò</th>
                    <th>✅ Trạng thái</th>
                    <th>📆 Tạo lúc</th>
                    <th class="text-center">⚙️ Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($admins as $index => $admin)
                    <tr class="hover:bg-base-300/30 transition-colors duration-200">
                        <td>{{ $index + 1 }}</td>
                        <td class="font-medium">{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->phone ?? '---' }}</td>
                        <td>
                            @php
                                $roleColor = match($admin->role ?? 'admin') {
                                    'admin' => 'badge-error',
                                    'moderator' => 'badge-warning',
                                    'support' => 'badge-info',
                                    default => 'badge-neutral'
                                };
                                $roleLabel = match($admin->role ?? 'admin') {
                                    'admin' => '👑 Admin',
                                    'moderator' => '🛡️ Moderator',
                                    'employee' => '💬 Employee',
                                    default => '❓ Khác'
                                };
                            @endphp
                            <span class="badge {{ $roleColor }} text-white text-xs">{{ $roleLabel }}</span>
                        </td>
                        <td>
                            @php
                                $status = $admin->status ?? 1;
                            @endphp
                            @if($status == 1)
                                <span class="badge badge-success text-white text-xs">✅ Hoạt động</span>
                            @else
                                <span class="badge badge-error text-white text-xs">❌ Vô hiệu</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($admin->created_at)->format('d/m/Y') }}</td>
                        <td>
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-outline btn-warning btn-xs rounded-lg">
                                    📝 Sửa
                                </a>
                                <button type="button" class="btn btn-outline btn-error btn-xs rounded-lg" wire:click='delete({{ $admin->id }})'>
                                    🗑️ Xóa
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-8 text-gray-500">
                            <span class="text-lg">😔 Không có quản trị viên nào</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
