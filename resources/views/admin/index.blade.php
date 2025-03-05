@extends("app")

@section('title', 'Admin List')

@section("content")
 <div class="container mx-auto p-6">
     <div class="flex flex-col h-full">
        <div class="grow">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                <h2 class="text-2xl font-semibold text-white-800 dark:text-dark-200">Admin List</h2>

                <a href="{{ route('admin.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors dark:bg-blue-600 dark:hover:bg-blue-700">
                    ➕ Add Admin
                </a>
            </div>
            <div class="my-3">
                <div>
                    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                        <table class="table" x-ref="headers">
                            <thead class="text-white-800 dark:text-dark-700">
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
                                    <tr class="hover:bg-base-200/50">
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $admin->name }}</td>
                                        <td class="text-center">{{ $admin->email }}</td>
                                        <td class="text-center">{{ $admin->password }}</td>
                                        <td class="text-center">{{ $admin->phone }}</td>
                                        <td class="px-6 py-4 text-sm text-center">
                                            <div class="flex justify-center space-x-2">
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.edit', $admin->id) }}"
                                                   class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600 transition-colors dark:bg-yellow-600 dark:hover:bg-yellow-700">
                                                    ✏️ Edit
                                                </a>
                                                <!-- Delete Button -->
                                                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this admin?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition-colors dark:bg-red-600 dark:hover:bg-red-700">
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
            </div>
        </div>
     </div>
 </div>
@endsection
