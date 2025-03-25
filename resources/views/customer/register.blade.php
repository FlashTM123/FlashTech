<!DOCTYPE html>
<html data-theme="light" lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .auth-bg {
            background-image: linear-gradient(to bottom right, #f0fdf4, #dcfce7);
        }
    </style>
</head>
<body class="min-h-screen auth-bg flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="card bg-white shadow-lg rounded-2xl overflow-hidden">
            <figure class="px-10 pt-10 bg-gradient-to-r from-green-500 to-teal-500 h-32 flex items-center justify-center">
                <i class="fas fa-user-plus text-6xl text-white"></i>
            </figure>
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold text-center mb-1">Create Account</h2>
                <p class="text-center text-gray-500 mb-6">Điền thông tin để đăng ký</p>

                <form class="space-y-4">
                    <!-- Họ và tên -->
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Họ và tên*</span>
                      </label>
                      <input type="text" placeholder="Nguyễn Văn A" class="input input-bordered w-full" required>
                    </div>

                    <!-- Email -->
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Email*</span>
                      </label>
                      <input type="email" placeholder="email@example.com" class="input input-bordered w-full" required>
                      <label class="label">
                        <span class="label-text-alt">Vui lòng nhập email hợp lệ</span>
                      </label>
                    </div>

                    <!-- Mật khẩu -->
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Mật khẩu*</span>
                      </label>
                      <input type="password" placeholder="Ít nhất 8 ký tự" class="input input-bordered w-full" minlength="8" required>
                      <label class="label">
                        <span class="label-text-alt">Mật khẩu phải chứa chữ hoa, chữ thường và số</span>
                      </label>
                    </div>

                    <!-- Ngày sinh -->
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Ngày sinh*</span>
                      </label>
                      <input type="date" class="input input-bordered w-full" required>
                    </div>

                    <!-- Giới tính -->
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Giới tính*</span>
                      </label>
                      <select class="select select-bordered w-full" required>
                        <option disabled selected>Chọn giới tính</option>
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                        <option value="other">Khác</option>
                      </select>
                    </div>

                    <!-- Số điện thoại -->
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Số điện thoại*</span>
                      </label>
                      <input type="tel" placeholder="0123456789" pattern="[0-9]{10}" class="input input-bordered w-full" required>
                    </div>

                    <!-- Địa chỉ -->
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Địa chỉ</span>
                      </label>
                      <input type="text" placeholder="Số nhà, đường, quận, thành phố" class="input input-bordered w-full">
                    </div>

                    <!-- Điều khoản -->
                    <div class="form-control mt-6">
                      <label class="label cursor-pointer justify-start gap-2">
                        <input type="checkbox" class="checkbox checkbox-primary" required>
                        <span class="label-text">Tôi đồng ý với <a href="#" class="link link-primary">điều khoản sử dụng</a></span>
                      </label>
                    </div>

                    <!-- Nút đăng ký -->
                    <div class="form-control mt-6">
                      <button type="submit" class="btn btn-primary">Đăng ký tài khoản</button>
                    </div>
                  </form>
            </div>
        </div>

        <div class="text-center mt-6 text-gray-500 text-sm">
            <aside>
                <p>Copyright © {{ date('Y') }} - All right reserved by FlashTM's teams</p>
            </aside>
        </div>
    </div>
</body>
</html>
