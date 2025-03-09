
<div class="container mx-auto p-6">
   <div class="flex justify-center mt-4" >
       <label class="input">
           <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></g></svg>
           <input type="search" class="grow" placeholder="Search" />
           <kbd class="kbd kbd-sm">⌘</kbd>
           <kbd class="kbd kbd-sm">K</kbd>
       </label>
   </div>
    <br>
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
