<!DOCTYPE html>
<html lang="vi" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập | FlashGear</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .login-hero {
      background: url('https://images.unsplash.com/photo-1612831455543-bda9ee7ff9b0?auto=format&fit=crop&w=1350&q=80') no-repeat center center;
      background-size: cover;
    }

    .glass {
      background: rgba(255, 255, 255, 0.75);
      backdrop-filter: blur(10px);
      border-radius: 1.5rem;
      box-shadow: 0 8px 32px rgba(0,0,0,0.1);
    }

    .shop-text-gradient {
      background: linear-gradient(90deg, #ff6b6b, #f8b400);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-base-200">

  <div class="container max-w-6xl mx-auto p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

      <!-- Hình ảnh quảng cáo -->
      <div class="login-hero rounded-3xl h-[500px] hidden md:block relative">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-tr from-primary to-secondary opacity-40 rounded-3xl"></div>
        <div class="absolute bottom-6 left-6 text-white z-10">
          <h2 class="text-4xl font-bold leading-tight">Chào mừng bạn đến với <span class="shop-text-gradient">FlashGear</span></h2>
          <p class="mt-4 text-lg">Nơi mua sắm linh kiện máy tính chính hãng, giá tốt mỗi ngày!</p>
        </div>
      </div>

      <!-- Form đăng nhập -->
      <div class="glass p-10">
        <div class="mb-8 text-center">
          <h1 class="text-4xl font-bold text-gray-800">Đăng nhập</h1>
          <p class="text-gray-500 mt-2">Truy cập tài khoản để mua sắm ngay hôm nay!</p>
        </div>

        @if (session('error'))
        <div role="alert" class="alert alert-error mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
               viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <span>{{ session('error') }}</span>
        </div>
        @endif

        <form action="{{ route('customer.loginprocess') }}" method="POST">
          @csrf

          <div class="form-control mb-4">
            <label class="label"><span class="label-text font-semibold">Email</span></label>
            <label class="input input-bordered flex items-center gap-2">
              <i class="fas fa-envelope text-gray-400"></i>
              <input type="email" name="email" required class="grow" placeholder="email@example.com">
            </label>
          </div>

          <div class="form-control mb-4">
            <label class="label"><span class="label-text font-semibold">Mật khẩu</span></label>
            <label class="input input-bordered flex items-center gap-2">
              <i class="fas fa-lock text-gray-400"></i>
              <input type="password" name="password" required class="grow" placeholder="••••••••">
            </label>
            <label class="label">
              <a href="#" class="label-text-alt link link-hover text-primary">Quên mật khẩu?</a>
            </label>
          </div>

          <div class="form-control mb-6">
            <label class="cursor-pointer label justify-start gap-2">
              <input type="checkbox" class="checkbox checkbox-primary" checked />
              <span class="label-text">Ghi nhớ đăng nhập</span>
            </label>
          </div>

          <button type="submit" class="btn btn-primary w-full mb-4">
            <i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập
          </button>

          <div class="divider">hoặc</div>

          <div class="grid grid-cols-2 gap-4">
            <button type="button" class="btn btn-outline">
              <i class="fab fa-google text-red-500 mr-2"></i> Google
            </button>
            <button type="button" class="btn btn-outline">
              <i class="fab fa-facebook-f text-blue-600 mr-2"></i> Facebook
            </button>
          </div>

          <p class="text-center mt-6">
            Chưa có tài khoản?
            <a href="{{ route('customer.register')}}" class="link link-primary font-semibold">Đăng ký ngay</a>
          </p>
        </form>
      </div>
    </div>

    <!-- Footer -->
    <div class="text-center mt-10 text-sm text-gray-500">
      © {{ date('Y') }} FlashTM. Tất cả quyền được bảo lưu.
    </div>
  </div>
</body>
</html>
