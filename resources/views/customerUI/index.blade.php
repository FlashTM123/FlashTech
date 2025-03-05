@vite(['resources/css/app.css', 'resources/js/app.js'])

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
</head>
<body>

<!-- Navbar -->
<div class="navbar bg-base-100 shadow-sm px-6">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">daisyUI</a>
    </div>

    <div class="flex justify-center space-x-6 border-b py-2">
        <a href="#" class="hover:underline">Laptop</a>
        <a href="#" class="hover:underline">Component</a>
        <a href="#" class="hover:underline">Accessories</a>
    </div>


    <!-- Giỏ hàng -->
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zM9 21a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="badge badge-sm indicator-item">8</span>
                </div>
            </div>
            <div tabindex="0" class="card card-compact dropdown-content bg-base-100 z-10 mt-3 w-52 shadow">
                <div class="card-body">
                    <span class="text-lg font-bold">8 Items</span>
                    <span class="text-info">Subtotal: $999</span>
                    <div class="card-actions">
                        <button class="btn btn-primary btn-block">View cart</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Avatar User -->
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img alt="User Avatar" src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                </div>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-10 mt-3 w-52 p-2 shadow">
                <li><a class="justify-between">Profile <span class="badge">New</span></a></li>
                <li><a>Settings</a></li>
                <li><a>Logout</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Carousel -->
<div class="container mx-auto p-6">
    <div class="carousel w-full relative">
        <div class="carousel-item w-full hidden opacity-0 transition-opacity duration-700 ease-in-out" id="slide1">
            <img src="https://laptopaz.vn/media/banner/17_Apr1fd244396e2ea3896e707e979899d4d3.jpg" class="w-full rounded-lg shadow-lg" />
        </div>
        <div class="carousel-item w-full hidden opacity-0 transition-opacity duration-700 ease-in-out" id="slide2">
            <img src="https://laptopaz.vn/media/banner/27_Feb3f0f2afd60ebd23638c40e604c4f2897.jpg" class="w-full rounded-lg shadow-lg" />
        </div>
        <div class="carousel-item w-full hidden opacity-0 transition-opacity duration-700 ease-in-out" id="slide3">
            <img src="https://laptopaz.vn/media/banner/17_Feb8b491e793555c63d35a387450ec7db41.jpg" class="w-full rounded-lg shadow-lg" />
        </div>
        <div class="carousel-item w-full hidden opacity-0 transition-opacity duration-700 ease-in-out" id="slide4">
            <img src="https://laptopaz.vn/media/banner/09_Oct570e76d9744972088213c80a18729bb0.jpg" class="w-full rounded-lg shadow-lg" />
        </div>
    </div>

    <!-- Nút điều hướng Carousel -->
    <div class="flex justify-center mt-4">
        <button id="prev" class="btn btn-circle mr-2">❮</button>
        <button id="next" class="btn btn-circle">❯</button>
    </div>
</div>

<!-- Script Carousel -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentIndex = 0;
        const slides = document.querySelectorAll(".carousel-item");
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.add("hidden", "opacity-0"));
            slides[index].classList.remove("hidden", "opacity-0");
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            showSlide(currentIndex);
        }

        document.getElementById("prev").addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            showSlide(currentIndex);
        });

        document.getElementById("next").addEventListener("click", nextSlide);

        setInterval(nextSlide, 3000); // Tự động chuyển slide sau 3 giây

        showSlide(currentIndex);
    });
</script>

</body>
</html>
