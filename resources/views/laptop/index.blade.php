@extends('app')

@section('title', 'Laptop')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex flex-col h-full">
            <div class="grow">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                    <h2 class="text-2xl font-semibold text-white-800 dark:text-dark-200">Laptop List</h2>
                    
                    <a href="{{ route('laptop.create') }}" class="btn btn-outline">
                        ➕ Add Laptop
                    </a>
                </div>
             @livewire('laptop-page')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(laptopId) {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you really want to delete this laptop?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + laptopId).submit();
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            @if(session('add_success'))
            Swal.fire({
                title: "Added Successfully!",
                text: "Laptop has been added successfully",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK",
            });
            @endif
            @if(session('edit_success'))
            Swal.fire({
                title: "Updated Successfully!",
                text: "The laptop details have been updated successfully.",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            });
            @endif
            @if(session('delete_success'))
            Swal.fire({
                title: "Deleted Successfully!",
                text: "The laptop has been removed successfully.",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            });
            @endif
        });
    </script>
@endsection
