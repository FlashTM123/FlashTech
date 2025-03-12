@extends("app")

@section('title', 'Admin List')

@section("content")
    <div class="container mx-auto p-6">
        <div class="flex flex-col h-full">
            <div class="grow">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Admin List</h2>
                    <a href="{{ route('admin.create') }}" class="btn btn-outline btn-primary">
                       ➕ Add Admin
                    </a>
                </div>
                <div class="my-3">
                    <div>
                        <div class="overflow-x-auto rounded-lg border border-base-content/5 bg-base-100 shadow-lg">
                            <table class="table w-full">
                                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Password</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $index => $admin)
                                    <tr class="hover:bg-gray-200 dark:hover:bg-gray-800">
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $admin->name }}</td>
                                        <td class="text-center">{{ $admin->email }}</td>
                                        <td class="text-center">{{ $admin->password }}</td>
                                        <td class="text-center">{{ $admin->phone }}</td>
                                        <td class="px-6 py-4 text-sm text-center">
                                            <div class="flex justify-center space-x-2">
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.edit', $admin->id) }}"
                                                   class="btn btn-outline btn-warning">
                                                     📝 Edit
                                                </a>
                                                <!-- Delete Button -->
                                                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this admin?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-outline btn-error">
                                                       🗑️ Delete
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
                </div>
            </div>
        </div>
    </div>
@endsection
