<div
    class="product-card group relative bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 w-[300px] mx-auto">

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

    <!-- SweetAlert Event Listeners -->
    <script>
        window.addEventListener('toast:wishlistAdd', event => {
            Swal.fire({
                toast: true,
                position: 'top',
                icon: event.detail[0].icon || 'success',
                title: event.detail[0].message || 'Item added to wishlist!',
                showConfirmButton: false,
                timer: 3000
            });
        });
        window.addEventListener('toast:added', event => {
            const detail = event.detail[0];

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: detail.icon || 'success',
                title: detail.message || 'Item added to cart!',
                text: detail.subtitle || 'Product successfully added to your shopping cart',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000,
                timerProgressBar: true,
                width: '400px',
                padding: '1rem',
                background: '#ffffff',
                color: '#1f2937',
                iconColor: '#10b981',
                customClass: {
                    popup: 'enhanced-toast',
                    title: 'toast-title',
                    content: 'toast-content',
                    timerProgressBar: 'toast-progress',
                    closeButton: 'toast-close'
                },
                didOpen: (toast) => {
                    // Add custom animations
                    toast.style.animation = 'slideInRight 0.3s ease-out';

                    // Add hover pause functionality
                    toast.addEventListener('mouseenter', () => {
                        Swal.stopTimer();
                    });

                    toast.addEventListener('mouseleave', () => {
                        Swal.resumeTimer();
                    });

                    // Add action button if product info is available
                    if (detail.productName || detail.viewCart) {
                        const actionButton = document.createElement('button');
                        actionButton.innerHTML = `
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"/>
                        </svg>
                        View Cart
                    `;
                        actionButton.className = 'toast-action-btn';
                        actionButton.onclick = () => {
                            window.location.href = '/cart'; // Adjust URL as needed
                            Swal.close();
                        };

                        toast.querySelector('.swal2-content').appendChild(actionButton);
                    }
                },
                willClose: (toast) => {
                    toast.style.animation = 'slideOutRight 0.3s ease-in';
                }
            });
        });
    </script>

    <!-- Product Image Section -->
    <div class="relative aspect-square bg-gray-50 overflow-hidden">
        <a name="{{ $item->id }}"
            href="{{ route('shop.show', ['id' => $item->id, 'slug' => Str::slug($item->name_en)]) }}"
            class="block w-full h-full">
            <img src="{{ URL::to('storage/' . $item->main_image_url) }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                alt="{{ $item->name }}" loading="lazy">
        </a>

        <!-- Wishlist Button - Top Right -->
        {{-- <button id="whishlist-{{ $item->id }}" wire:click="addToWishlist"
                class="absolute top-3 right-3 w-9 h-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-black hover:text-white transition-all duration-200 opacity-0 group-hover:opacity-100">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
            </svg>
        </button> --}}

        <!-- Quick Actions Overlay -->
        <div
            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
            <div class="flex gap-2">
                <!-- Quick View -->
                <button wire:click="$dispatch('openQuickView', { productId: {{ $item->id }} })"
                    class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:bg-black hover:text-white transition-all duration-200 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>

                <!-- View Details -->
                <a href="{{ route('shop.show', ['id' => $item->id, 'slug' => Str::slug($item->name_en)]) }}"
                    class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:bg-black hover:text-white transition-all duration-200 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Offer Badge -->
        @if (!empty($item->offer_price))
            <div class="absolute top-3 left-3 bg-black text-white text-xs font-medium px-2 py-1 rounded-full">
                {{ session('lang') == 'en' ? 'SALE' : 'تخفيض' }}
            </div>
        @endif
    </div>

    <!-- Product Info Section -->
    <div class="p-4">
        <!-- Product Name -->
        <h3 class="font-medium text-gray-900 text-sm mb-2 line-clamp-2 leading-tight">
            @if (session('lang') == 'en')
                {{ $item->name_en }}
            @else
                {{ $item->name_ar }}
            @endif
        </h3>

        <!-- Pricing -->
        <div class="flex items-center gap-2 mb-4">
            @if (!empty($item->offer_price))
                <span class="text-lg font-bold text-gray-900">
                    {{ session('lang') == 'en' ? '$' : '$' }} {{ $item->getFormattedOfferPrice() }}
                </span>
                <span class="text-sm text-gray-500 line-through">
                    {{ session('lang') == 'en' ? '$' : '$' }} {{ $item->getFormattedPrice() }}
                </span>
            @else
                <span class="text-lg font-bold text-gray-900">
                    {{ session('lang') == 'en' ? '$' : '$' }} {{ $item->getFormattedPrice() }}
                </span>
            @endif
        </div>

        <!-- Add to Cart Button -->
        <button id="p-item-{{ $item->id }}" wire:click="addToCart({{ $item->id }})"
            class="w-full bg-white text-black border-2 py-3 px-4 rounded-lg font-medium text-sm  transition-colors duration-200 flex items-center justify-center gap-2 group/btn">
            <svg class="w-6 h-6 transition-transform group-hover/btn:scale-110" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <!-- Cart body -->
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5-6m0 0L4 5" />

                <!-- Cart wheels -->
                <circle cx="9" cy="19" r="1" stroke-width="1.5" fill="currentColor" />
                <circle cx="20" cy="19" r="1" stroke-width="1.5" fill="currentColor" />

                <!-- Cart handle -->
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.4 7H21l-2 8H7" />
            </svg>
            {{ session('lang') == 'en' ? 'Add to Cart' : 'أضف إلى السلة' }}
        </button>
    </div>
</div>
