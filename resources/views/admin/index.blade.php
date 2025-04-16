@extends("app")

@section('title', 'Admin List')

@section("content")
<div class="container mx-auto p-6">
    <livewire:admin-list/>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(adminId) {
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
                        document.getElementById(`delete-form-${adminId}`).submit();
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

            @if(session('admin_deleted'))
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
