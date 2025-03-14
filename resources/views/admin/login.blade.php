<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            "50": "#eff6ff", "100": "#dbeafe", "200": "#bfdbfe",
                            "300": "#93c5fd", "400": "#60a5fa", "500": "#3b82f6",
                            "600": "#2563eb", "700": "#1d4ed8", "800": "#1e40af",
                            "900": "#1e3a8a", "950": "#172554"
                        }
                    }
                },
                fontFamily: {
                    sans: ["Inter", "ui-sans-serif", "system-ui", "Segoe UI", "Roboto", "Arial", "sans-serif"]
                }
            }
        }
    </script>
</head>
<body class="h-full w-full">
<div class="px-6 py-12 lg:px-8">
    <div class="my-10">
        <div class="sm:mx-auto sm:w-full sm:max-w-xl">
            <h2 class="text-center bg-gradient-to-r from-blue-400 to-blue-700 bg-clip-text text-transparent uppercase text-3xl font-bold">LCAS Admin</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-xl">
            @if(session('error'))
                <div class="bg-red-100 text-red-700 border border-red-400 p-3 rounded-md mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.LoginProcess') }}" method="POST" class="grid grid-flow-row auto-rows-min gap-3 space-y-6 border bg-white rounded-2xl border-gray-200 shadow-xl p-6">
                    <h2 class="text-2xl font-semibold">Sign in</h2>
                @csrf
               <div>
                   <label for="email" class="pt-0 label label-text font-semibold">
                    <span>
                        Email
                    </span>
                   </label>
                   <div class="flex-1 relative">
                       <input id="email" type="email" name="email" placeholder="Email Address...." class="input border border-gray-300 rounded-lg w-full pl-10 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none">
                         <svg class="inline w-5 h-5 absolute top-1/2 -translate-y-1/2 left-3 text-gray-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                           <path d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" stroke-linecap="round" stroke-linejoin="round"></path>
                       </svg>


                   </div>
               </div>
              <div>
                  <label for="password" class="pt-0 label label-text font-semibold">
                    <span>
                        Password
                    </span>
                  </label>
                  <div class="flex-1 relative">
                      <input id="password" type="password" name="password" placeholder="Password...." class="input border border-gray-300 rounded-lg w-full pl-10 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none">
                      <svg class="inline w-5 h-5 absolute top-1/2 -translate-y-1/2 left-3 text-gray-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                          <path d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>


                  </div>
              </div>
                <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white py-2.5 rounded-lg text-sm font-medium focus:ring-4 focus:ring-primary-300">
                    Sign in
                </button>
            </form>
        </div>
    </div>


</div>
</body>
</html>
