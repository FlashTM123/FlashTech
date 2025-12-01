<footer class="bg-gradient-to-b from-gray-900 via-gray-800 to-black text-gray-100 mt-20 border-t border-gradient-to-r from-indigo-500/20 via-purple-500/20 to-pink-500/20">
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <!-- Về FlashTech -->
            <div class="space-y-4">
                <div class="flex items-center gap-2 mb-4">
                    <i class="fa-solid fa-bolt text-indigo-400 text-xl animate-pulse"></i>
                    <h2 class="font-extrabold text-2xl bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                        FlashTech
                    </h2>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Chuyên cung cấp laptop, linh kiện và phụ kiện chính hãng với giá tốt nhất, hỗ trợ kỹ thuật tận tâm.
                </p>
                <div class="flex gap-4 pt-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 flex items-center justify-center text-white transition-all duration-300 hover:scale-110">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 flex items-center justify-center text-white transition-all duration-300 hover:scale-110">
                        <i class="fab fa-instagram text-sm"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 flex items-center justify-center text-white transition-all duration-300 hover:scale-110">
                        <i class="fab fa-youtube text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Danh mục sản phẩm -->
            <div class="space-y-4">
                <h3 class="font-bold text-lg text-white flex items-center gap-2">
                    <span class="w-1 h-6 bg-gradient-to-b from-indigo-400 to-purple-400 rounded-full"></span>
                    Danh mục
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ url('/laptop') }}" class="text-gray-400 hover:text-indigo-400 transition-colors flex items-center gap-2">
                            <i class="fa-solid fa-laptop text-indigo-400 text-xs"></i>
                            Laptop
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/component') }}" class="text-gray-400 hover:text-indigo-400 transition-colors flex items-center gap-2">
                            <i class="fa-solid fa-microchip text-indigo-400 text-xs"></i>
                            Linh kiện
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/accessories') }}" class="text-gray-400 hover:text-indigo-400 transition-colors flex items-center gap-2">
                            <i class="fa-solid fa-mouse text-indigo-400 text-xs"></i>
                            Phụ kiện
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Chính sách -->
            <div class="space-y-4">
                <h3 class="font-bold text-lg text-white flex items-center gap-2">
                    <span class="w-1 h-6 bg-gradient-to-b from-purple-400 to-pink-400 rounded-full"></span>
                    Chính sách
                </h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition-colors text-sm">Chính sách bảo hành</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition-colors text-sm">Chính sách đổi trả</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition-colors text-sm">Bảo mật thông tin</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition-colors text-sm">Thanh toán & giao hàng</a></li>
                </ul>
            </div>

            <!-- Liên hệ -->
            <div class="space-y-4">
                <h3 class="font-bold text-lg text-white flex items-center gap-2">
                    <span class="w-1 h-6 bg-gradient-to-b from-pink-400 to-rose-400 rounded-full"></span>
                    Liên hệ
                </h3>
                <div class="space-y-3">
                    <p class="text-gray-400 text-sm flex items-start gap-3">
                        <i class="fa-solid fa-phone text-indigo-400 text-xs mt-1 flex-shrink-0"></i>
                        <a href="tel:0123456789" class="hover:text-indigo-400 transition-colors">
                            0123 456 789
                        </a>
                    </p>
                    <p class="text-gray-400 text-sm flex items-start gap-3">
                        <i class="fa-solid fa-envelope text-indigo-400 text-xs mt-1 flex-shrink-0"></i>
                        <a href="mailto:support@flashtech.vn" class="hover:text-indigo-400 transition-colors">
                            support@flashtech.vn
                        </a>
                    </p>
                    <p class="text-gray-400 text-sm flex items-start gap-3">
                        <i class="fa-solid fa-map-pin text-indigo-400 text-xs mt-1 flex-shrink-0"></i>
                        <span>Hà Nội, Việt Nam</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-700 my-8"></div>

        <!-- Copyright & Links -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-gray-500 text-sm">
                © {{ date('Y') }} <span class="text-indigo-400 font-semibold">FlashTech</span> - Tất cả các quyền được bảo lưu.
            </p>
            <div class="flex gap-6 text-sm">
                <a href="#" class="text-gray-500 hover:text-indigo-400 transition-colors">Điều khoản sử dụng</a>
                <a href="#" class="text-gray-500 hover:text-indigo-400 transition-colors">Quyền riêng tư</a>
                <a href="#" class="text-gray-500 hover:text-indigo-400 transition-colors">Sitemap</a>
            </div>
        </div>
    </div>

    <!-- Animated Background -->
    <div class="fixed bottom-0 right-0 w-96 h-96 bg-gradient-to-br from-indigo-500/10 to-purple-500/10 rounded-full blur-3xl -z-10 opacity-30"></div>
</footer>
