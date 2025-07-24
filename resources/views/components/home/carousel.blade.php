<div id="default-carousel" class="relative w-full overflow-hidden rounded-xl shadow-lg wowDiv" 
     data-carousel="slide" data-animation="animate__backInUp" data-delay="300">
     
    <!-- Shop Now Button -->
    <div class="absolute md:top-1/2 top-4 right-4 md:right-10 z-40">
        <a href="/shop" class="inline-block px-6 py-3 font-bold rounded-full shadow-lg  bg-gray-500 text-white
                          hover:bg-purple-100 hover:text-black hover:scale-105 transition-all duration-300 text-sm md:text-base">
            {{ session('lang') == 'en' ? 'Shop Now →' : 'تسوق الان ←' }}
        </a>
    </div>

    <!-- Carousel Wrapper -->
    <div class="relative h-48 md:h-[600px] w-full">
        @foreach ($carousel->images as $index => $image)
            <div class="hidden duration-700 ease-in-out absolute inset-0" data-carousel-item>
                <div class="absolute inset-0 bg-gray-200 animate-pulse"></div>
                <img src="{{ URL::to('storage/' . $image->url) }}"
                     class="absolute w-full h-full object-cover object-center"
                     alt="Carousel image {{ $index + 1 }}"
                     loading="lazy">
            </div>
        @endforeach
    </div>

    <!-- Indicators -->
    <div class="absolute z-30 flex space-x-2 -translate-x-1/2 bottom-4 left-1/2">
        @foreach ($carousel->images as $index => $image)
            <button type="button" 
                    class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition-colors"
                    aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
                    aria-label="Slide {{ $index + 1 }}"
                    data-carousel-slide-to="{{ $index }}"></button>
        @endforeach
    </div>
</div>