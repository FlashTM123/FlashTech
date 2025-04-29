@extends('app')

@section('title', 'Component')

@section('content')

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold">Component List</h2>
            <form method="GET" action="{{ route('component.index') }}" class="mb-4" id="brand-filter-form">

            </form>
            <a href="{{ route('component.create') }}" class="btn btn-outline">
                ➕ Add Component
            </a>
        </div>

       @livewire('component-page')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>


        function confirmDelete(componentId) {
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${componentId}`).submit();
                }
            });
        }

        @if(session('add_success'))
        Swal.fire({
            title: "Added Successfully!",
            text: "The admin has been added successfully.",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        });
        @endif

        @if(session('edit_success'))
        Swal.fire({
            title: "Updated Successfully!",
            text: "The admin details have been updated successfully.",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        });
        @endif

        @if(session('delete_success'))
        Swal.fire({
            title: "Deleted Successfully!",
            text: "The admin has been removed successfully.",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        });
        @endif
    </script>


@endsection

