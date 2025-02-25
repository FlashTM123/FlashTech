@extends("app")

@section('title', 'Admin List')

@section("content")
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold">Admin List</h2>
            <a href="{{ route('admin.create') }}" class="btn btn-primary">
                ➕ Add Admin
            </a>
        </div>

        <div class="overflow-x-auto ">
            <table class="table">
                <!-- head -->
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($admins as $index => $admin)
                    <tr class="hover:bg-gray-100 border-b">
                        <th class="p-3">{{ $index + 1 }}</th>
                        <td class="p-3">{{ $admin->name }}</td>
                        <td class="p-3">{{ $admin->email }}</td>
                        <td class="p-3">{{ $admin->password }}</td>
                        <td class="p-3">{{ $admin->phone }}</td>
                        <td class="p-3 text-center">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning btn-sm">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this admin?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm">
                                        ❌ Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        feather.replace();
    </script>

    <!-- CSS Styles -->
    <style>
        .edit-btn, .delete-btn {
            border: none;
            background: none;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .edit-btn i, .delete-btn i {
            width: 16px;
            height: 16px;
        }
        .delete-btn {
            color: red;
        }
        .edit-btn {
            color: blue;
        }
    </style>

    <!-- Feather Icons Library -->

@endsection
