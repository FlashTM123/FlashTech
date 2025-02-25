@extends('app')

@section('title', 'Color')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold">Color List </h2>
            <a href=" {{ route('color.create') }}" class="btn btn-primary">➕ Add Color</a>
        </div>

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($colors as $index => $color)
                    <tr class="hover:bg-gray-100 border-b">
                        <th class="p-3">{{ $index + 1 }}</th>
                        <td class="p-3">{{ $color ->name }}</td>
                        <td class="p-3 text-center">
                            <div class="flex space-x-2">
                                <a href="{{ route('color.edit', $color->id) }}" class="btn btn-warning btn-sm">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('color.destroy', $color->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this laptop?');">
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

@endsection
