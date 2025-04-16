<!-- resources/views/customer/register.blade.php -->
<!DOCTYPE html>
<html lang="vi" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng ký tài khoản | FlashTM</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    .register-left {
      background: linear-gradient(to bottom right, #10b981, #0f766e);
    }
    .glass {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .btn-register {
      background: linear-gradient(to right, #10b981, #0ea5e9);
      color: white;
    }
    .btn-register:hover {
      transform: scale(1.03);
      box-shadow: 0 4px 20px rgba(16, 185, 129, 0.4);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100 p-6">

  <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 rounded-2xl overflow-hidden shadow-2xl bg-white">
    <!-- Cột trái: hình ảnh & slogan -->
    <div class="register-left flex flex-col items-center justify-center text-white p-10 space-y-6">
      <div class="text-center">
        <h1 class="text-4xl font-bold">Chào mừng đến FlashGear</h1>
        <p class="mt-3 text-sm">Nơi bạn tìm thấy linh kiện phù hợp với nhu cầu công nghệ của mình!</p>
      </div>
      <img src="https://img.freepik.com/free-vector/e-commerce-campaign-concept-illustration_114360-8253.jpg?w=740" alt="E-commerce" class="w-72 rounded-xl shadow-xl">
    </div>

    <!-- Cột phải: form -->
    <div class="p-8 bg-white">
      <h2 class="text-3xl font-bold mb-2">Tạo tài khoản mới</h2>
      <p class="text-sm text-gray-500 mb-6">Nhanh chóng & dễ dàng - chỉ mất chưa đến 1 phút!</p>

      @if (session('success'))
        <div class="alert alert-success mb-6">
          <i class="fas fa-check-circle text-green-600"></i>
          <span>{{ session('success') }}</span>
        </div>
      @endif

      <form method="POST" action="{{ route('customer.registerprocess') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
          <label class="block font-medium">Ảnh đại diện <span class="text-red-500">*</span></label>
          <input type="file" name="image" class="file-input file-input-bordered w-full" required>
        </div>

        <div>
          <label class="block font-medium">Họ và tên <span class="text-red-500">*</span></label>
          <input type="text" name="name" class="input input-bordered w-full" placeholder="Nguyễn Văn A" required>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label class="block font-medium">Email <span class="text-red-500">*</span></label>
            <input type="email" name="email" class="input input-bordered w-full" required>
          </div>

          <div>
            <label class="block font-medium">Mật khẩu <span class="text-red-500">*</span></label>
            <input type="password" name="password" class="input input-bordered w-full" required>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label class="block font-medium">Ngày sinh <span class="text-red-500">*</span></label>
            <input type="date" name="date_of_birth" class="input input-bordered w-full" required>
          </div>

          <div>
            <label class="block font-medium">Giới tính <span class="text-red-500">*</span></label>
            <select name="gender" class="select select-bordered w-full" required>
              <option disabled selected>Chọn giới tính</option>
              <option value="male">Nam</option>
              <option value="female">Nữ</option>
              <option value="other">Khác</option>
            </select>
          </div>
        </div>

        <div>
          <label class="block font-medium">Số điện thoại <span class="text-red-500">*</span></label>
          <input type="text" name="phone" class="input input-bordered w-full" required>
        </div>

        <div>
          <label class="block font-medium">Địa chỉ</label>
          <input type="text" name="address" class="input input-bordered w-full">
        </div>

        <div class="flex items-center gap-2">
          <input type="checkbox" class="checkbox checkbox-sm checkbox-success" required>
          <label class="text-sm">Tôi đồng ý với <a href="#" class="link link-success">điều khoản</a></label>
        </div>

        <button type="submit" class="btn btn-register w-full mt-2">
          <i class="fas fa-user-plus mr-2"></i> Đăng ký
        </button>

        <div class="text-sm text-center mt-4">
          Đã có tài khoản?
          <a href="{{ route('customer.login') }}" class="link link-primary font-medium">Đăng nhập ngay</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
