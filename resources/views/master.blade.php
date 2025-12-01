@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title") - FlashTech</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-gray-800 dark:text-gray-100 min-h-screen flex flex-col">

    <!-- Header -->
    @include('layouts.header')

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-8 mt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '✅ Thành công',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: '❌ Lỗi',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
    @livewireScripts
</body>
</html>
