<footer class="bg-base-200 text-base-content mt-20">
    <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-4 gap-10">

      <!-- Về cửa hàng -->
      <div>
        <h2 class="font-bold text-lg mb-4">FlashGear</h2>
        <p class="text-sm leading-relaxed">
          Nền tảng chuyên cung cấp laptop, linh kiện và phụ kiện chính hãng, giá tốt, hỗ trợ kỹ thuật tận tâm.
        </p>
      </div>

      <!-- Điều hướng -->
      <div>
        <h2 class="font-semibold mb-4">Điều hướng</h2>
        <ul class="space-y-2 text-sm">
          <li><a href="{{ url('/laptop') }}" class="link link-hover">Laptop</a></li>
          <li><a href="{{ url('/component') }}" class="link link-hover">Linh kiện</a></li>
          <li><a href="{{ url('/accessories') }}" class="link link-hover">Phụ kiện</a></li>
          <li><a href="{{ url('/')}}" class="link link-hover">Trang chủ</a></li>
        </ul>
      </div>

      <!-- Chính sách -->
      <div>
        <h2 class="font-semibold mb-4">Chính sách</h2>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="link link-hover">Chính sách bảo hành</a></li>
          <li><a href="#" class="link link-hover">Chính sách đổi trả</a></li>
          <li><a href="#" class="link link-hover">Bảo mật thông tin</a></li>
          <li><a href="#" class="link link-hover">Thanh toán & giao hàng</a></li>
        </ul>
      </div>

      <!-- Liên hệ -->
      <div>
        <h2 class="font-semibold mb-4">Liên hệ</h2>
        <ul class="space-y-2 text-sm">
          <li>Hotline: <a href="tel:0123456789" class="link link-hover">0123 456 789</a></li>
          <li>Email: support@lcas.vn</li>
          <li>Địa chỉ: Hà Nội</li>
          <li class="flex gap-3 mt-2">
            <a href="#" class="text-gray-500 hover:text-primary transition"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-gray-500 hover:text-primary transition"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-gray-500 hover:text-primary transition"><i class="fab fa-youtube"></i></a>
          </li>
        </ul>
      </div>

    </div>

    <div class="text-center py-4 border-t border-base-300 text-sm">
      © {{ date('Y') }} FlashGear - All rights reserved by FlashTM.
    </div>
  </footer>
